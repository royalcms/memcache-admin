<?php

define('APP_NAME', 'MEMADMIN');
define('APP_VERSION', '2.0');

RC_Session::start();

class monitor extends Royalcms\Component\Routing\Controller
{

    protected $view;

    public function __construct()
    {
        header('content-type: text/html; charset=' . RC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        define('API_DEBUG', false);

        $this->view = royalcms('view')->getSmarty();
        // 模板目录
        $this->view->setTemplateDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR);
        $this->view->addPluginsDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR);
        $this->view->assign('theme_url', RC_Theme::get_template_directory_uri() . '/');

        $memadmingroup = config('app-memadmin::memadmingroup');
        $this->view->assign('memadmingroup',    $memadmingroup);
        $this->view->assign('service',          'monitor');
    }

    /**
     * 统计监控
     */
    public function init()
    {
        $this->view->assign('configure_url', array('text' => RC_Lang::get('memadmin::memadmin.monitor_configure'), 'href' => RC_Uri::url('memadmin/monitor/configure')));

        /* Loading ini file */
        $_ini = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $cluster                =  royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);

        $serverlists            = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllServers($cluster);

        $cluster_select         = Ecjia\App\Memadmin\DataAnalysis::clusterSelect('cluster_select', $cluster, 'live', 'onchange="changeCluster(this);"');

        $memAdmin               = new Ecjia\App\Memadmin\MemcacheManager();

        /* Initializing : making stats dump */
        $stats                  = array();
        foreach ($serverlists as $name => $server) {
            $stats[$name] = $memAdmin->switchServer($server['hostname'], $server['port'])->driver($_ini->get('stats_api'))->getStats();
        }

        /* Saving first stats dump */
        $file_path              = $this->_makeFilePath(RC_Session::get('royalcms_session'), $_ini->get('file_path'));
        file_put_contents($file_path, serialize($stats));
        
        /* Searching for connection error, adding some time to refresh rate to prevent error */
        $refresh_rate_timeout   = max($_ini->get('refresh_rate'), count($serverlists) * 0.25 + ($memAdmin->error()->count() * (0.5 + $_ini->get('connection_timeout'))));
        $refresh_rate_first     = 5 + $refresh_rate_timeout - $_ini->get('refresh_rate');
        $refresh_rate           = $_ini->get('refresh_rate');
        $refresh_delay          = sprintf('%.1f', $refresh_rate_timeout - $refresh_rate);
        $wait_tips = sprintf("加载在线统计, 请等待 ~%.0f 秒钟 ...", $refresh_rate_first);

        $this->view->assign('cluster',                $cluster);
        $this->view->assign('cluster_select',         $cluster_select);
        $this->view->assign('refresh_rate',           $refresh_rate);
        $this->view->assign('refresh_rate_timeout',   $refresh_rate_timeout);
        $this->view->assign('refresh_rate_first',     $refresh_rate_first);
        $this->view->assign('refresh_delay',          $refresh_delay);
        $this->view->assign('wait_tips',              $wait_tips);

        $this->view->display('monitor_stats.php');
    }

    private function _makeFilePath($cluster, $file_path)
    {
        /* Checking writing status in temporary folder  */
        if (is_dir($file_path) === false) {
            RC_File::makeDirectory($file_path);
        }
        if (is_writable($file_path) === false) {
            /* Trying to change permissions */
            chmod($file_path, 0775);
        }

        /* Hashing cluster  */
        $hash = md5($cluster);
        /* Cookie @FIXME not a perfect method   */
        if (!isset($_COOKIE['live_stats_id' . $hash])) {
            /* Generating unique id */
            $live_stats_id      = rand() . $hash;

            /* Cookie   */
            setcookie('live_stats_id' . $hash, $live_stats_id, time() + 60 * 60 * 24);
        } else {
            /* Backup from a previous request   */
            $live_stats_id      = $_COOKIE['live_stats_id' . $hash];
        }

        /* Live stats dump file */
        $file_path              = rtrim($file_path, '/') . DIRECTORY_SEPARATOR . 'live_stats.' . $live_stats_id;

        return $file_path;
    }

    /**
     * 数据监控
     */
    public function data()
    {
        /* Initializing requests */
        $cluster                = royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);

        /* Loading ini file */
        $_ini                   = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $file_path              = $this->_makeFilePath($cluster, $_ini->get('file_path'));

        /* Opening old stats dump   */
        $previous               = @unserialize(file_get_contents($file_path));

        /* Initializing variables   */
        $actual                 = array();

        $memAdmin               = new Ecjia\App\Memadmin\MemcacheManager();

        $serverlists            = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllServers($cluster);

        $refresh_rate           = $_ini->get('refresh_rate');

        /* Requesting stats for each server */
        foreach ($serverlists as $name => $server) {
            /* Start query time calculation */
            $time                           = microtime(true);
            /* Asking server for stats  */
            $actual[$name]                  = $memAdmin->switchServer($server['hostname'], $server['port'])->driver($_ini->get('stats_api'))->getStats();
            /* Calculating query time length    */
            $actual[$name]['query_time']    = max((microtime(true) - $time) * 1000, 1);
        }

        /* Analysing stats  */
        foreach ($serverlists as $name => $server) {
            /* Making an alias @FIXME Used ?    */
            $server             = $name;
            /* Diff between old and new dump    */
            $stats[$server]     = Ecjia\App\Memadmin\DataAnalysis::diff($previous[$server], $actual[$server]);
        }

        /* Making stats for each server */
        foreach ($stats as $server => $array) {
            /* Analysing request    */
            if ((isset($stats[$server]['uptime'])) && ($stats[$server]['uptime'] > 0)) {
                /* Computing stats  */
                $stats[$server]                         = Ecjia\App\Memadmin\DataAnalysis::stats($stats[$server]);

                /* Because we make a diff on every key, we must reasign some values */
                $stats[$server]['bytes_percent']        = sprintf('%.1f', $actual[$server]['bytes'] / $actual[$server]['limit_maxbytes'] * 100);
                $stats[$server]['bytes'] = $actual[$server]['bytes'];
                $stats[$server]['limit_maxbytes']       = $actual[$server]['limit_maxbytes'];
                $stats[$server]['curr_connections']     = $actual[$server]['curr_connections'];
                $stats[$server]['query_time']           = $actual[$server]['query_time'];
            }
        }

        /* Saving new stats dump */
        file_put_contents($file_path, serialize($actual));

        /* Header   */
        echo '<p>最后更新时间 : ' . date('r', time()) . ' (刷新率 : ' . $refresh_rate . ' 秒)</p>';

        /* Table header */
        echo '<strong> <div style="float: left;width: 16%">' . sprintf('%-36s', 'NAME') .'</div>';
        echo '<div style="float: left">';

        echo sprintf('%10s', 'SIZE') . sprintf('%7s', '%MEM') . sprintf('%8s', 'TIME') .
            sprintf('%6s', 'CONN') . sprintf('%7s', '%HIT') . sprintf('%8s', 'REQ/s') . sprintf('%8s', 'GET/s') . sprintf('%8s', 'SET/s') .
            sprintf('%8s', 'DEL/s') . sprintf('%8s', 'EVI/s') . sprintf('%11s', 'READ/s') . sprintf('%10s', 'WRITE/s') . '</div>'.'</strong>'  . '<hr class="memcache">';

        /* Showing stats for every server   */
        foreach ($stats as $server => $data) {
            echo '<div style="float: left;width: 16%">';

            /* Server name  */
            echo sprintf('%-36.36s', $server);
            echo '</div>';

            /* Checking for stats validity  */
            if ((isset($data['time'], $data['bytes_percent'], $data['get_hits_percent'], $data['query_time'], $data['request_rate'], $data['curr_connections'],
                    $data['get_rate'], $data['set_rate'], $data['delete_rate'], $data['eviction_rate'], $data['bytes_read'], $data['bytes_written'])) && ($data['time'] > 0)) {
                echo '<div style="float: left">';

                /* Total Memory */
                echo sprintf('%10s', Ecjia\App\Memadmin\DataAnalysis::byteResize($data['limit_maxbytes']) . 'b');

                /* Memory Occupation / Alert State  */
                if ($data['bytes_percent'] > $_ini->get('memory_alert')) {
                    echo str_pad('', 7 - strlen($data['bytes_percent']), ' ') . '<span class="red">' . sprintf('%.1f', $data['bytes_percent']) . '</span>';
                } else {
                    echo sprintf('%7.1f', $data['bytes_percent']);
                }

                /* Query Time   */
                echo sprintf('%5.0f', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['query_time'])) . ' ms';

                /* Current connection   */
                echo sprintf('%6s', $data['curr_connections']);

                /* Hit percent (get)    */
                if ($data['get_hits_percent'] < $_ini->get('hit_rate_alert')) {
                    echo str_pad('', 7 - strlen($data['get_hits_percent']), ' ') . '<span class="red">' . sprintf('%.1f', $data['get_hits_percent']) . '</span>';
                } else {
                    echo sprintf('%7.1f', $data['get_hits_percent']);
                }

                /* Request rate */
                echo sprintf('%8s', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['request_rate']));

                /* Get rate */
                echo sprintf('%8s', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['get_rate']));

                /* Set rate */
                echo sprintf('%8s', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['set_rate']));

                /* Delete rate  */
                echo sprintf('%8s', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['delete_rate']));

                /* Eviction rate    */
                if ($data['eviction_rate'] > $_ini->get('eviction_alert')) {
                    echo str_pad('', 8 - strlen(Ecjia\App\Memadmin\DataAnalysis::valueResize($data['eviction_rate'])), ' ') . '<span class="red">' . Ecjia\App\Memadmin\DataAnalysis::valueResize($data['eviction_rate']) . '</span>';
                } else {
                    echo sprintf('%8s', Ecjia\App\Memadmin\DataAnalysis::valueResize($data['eviction_rate']));
                }

                /* Bytes read   */
                echo sprintf('%11s', Ecjia\App\Memadmin\DataAnalysis::byteResize($data['bytes_read'] / $data['time']) . 'b');

                /* Bytes written    */
                echo sprintf('%10s', Ecjia\App\Memadmin\DataAnalysis::byteResize($data['bytes_written'] / $data['time']) . 'b');
                echo '</div>';

            } else {
                echo str_pad('', 20, ' ');
                echo '<div style="float:left;margin-left: 14px"> <span class="alert">检查或计算统计信息时发生错误</span> </div>';

            }

            /* End of Line  */
            echo '<div class="clearfix"></div>';
            echo '<hr>';
        }
    }


    /**
     * 统计监控
     */
    public function configure()
    {
        $this->view->assign('configure_url', array('text' => RC_Lang::get('memadmin::memadmin.statsmo_tit'), 'href' => RC_Uri::url('memadmin/monitor/init')));

        $this->view->assign('live_stats', RC_Uri::url('memadmin/monitor/live_stats'));
        $this->view->assign('miscellaneous', RC_Uri::url('memadmin/monitor/miscellaneous'));

        $config = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $refresh_rate           = $config->get('refresh_rate');
        $memory_alert           = $config->get('memory_alert');
        $hit_rate_alert         = $config->get('hit_rate_alert');
        $eviction_alert         = $config->get('eviction_alert');
        $connection_timeout     = $config->get('connection_timeout');
        $max_item_dump          = $config->get('max_item_dump');

        $this->view->assign('refresh_rate',           $refresh_rate);
        $this->view->assign('memory_alert',           $memory_alert);
        $this->view->assign('hit_rate_alert',         $hit_rate_alert);
        $this->view->assign('eviction_alert',         $eviction_alert);
        $this->view->assign('connection_timeout',     $connection_timeout);
        $this->view->assign('max_item_dump',          $max_item_dump);

        $this->view->display('monitor_configure.php');
    }

    public function live_stats()
    {
        $config = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $refresh_rate           = royalcms('request')->input('refresh_rate');
        $memory_alert           = royalcms('request')->input('memory_alert');
        $hit_rate_alert         = royalcms('request')->input('hit_rate_alert');
        $eviction_alert         = royalcms('request')->input('eviction_alert');

        $config->set('refresh_rate',    round(max(5, $refresh_rate)));
        $config->set('memory_alert',    $memory_alert);
        $config->set('hit_rate_alert',  $hit_rate_alert);
        $config->set('eviction_alert',  $eviction_alert);

//        return Ecjia\App\Memadmin\EcjiaController::showmessage('保存监控配置成功', 0x20 | 0x01, array('pjaxurl' => RC_Uri::url('memadmin/monitor/configure')));
        $data =  array(
            'msg'   => '保存监控配置成功',
            'url'   =>  RC_Uri::url('memadmin/monitor/configure'),
        );
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    
    public function miscellaneous()
    {
        $config = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $connection_timeout     = royalcms('request')->input('connection_timeout');
        $max_item_dump          = royalcms('request')->input('max_item_dump');

        $config->set('connection_timeout',  $connection_timeout);
        $config->set('max_item_dump',       $max_item_dump);

//        return $this->showmessage('保存监控配置成功', 0x20| 0x01, array('pjaxurl' => RC_Uri::url('memadmin/monitor/configure')));
        $data =  array(
            'msg'   => '保存监控配置成功',
            'url'   =>  RC_Uri::url('memadmin/monitor/configure'),
        );
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

}

//end