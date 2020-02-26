<?php

define('APP_NAME', 'MEMADMIN');
define('APP_VERSION', '2.0');

RC_Session::start();

class serverController extends Royalcms\Component\Routing\Controller
{

    protected $view;

    function __construct()
    {
        header('content-type: text/html; charset=' . RC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        $this->view = royalcms('view')->getSmarty();
        // 模板目录
        $this->view->setTemplateDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR);
        $this->view->addPluginsDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR);
        $this->view->assign('theme_url', RC_Theme::get_template_directory_uri() . '/');


        $memadmingroup = config('app-memadmin::memadmingroup');
        $this->view->assign('memadmingroup',    $memadmingroup);
        $this->view->assign('service',          'server');
    }

    /**
     * 默认频道首页
     */
    public function init()
    {
        /* Loading ini file */
        $_ini                       = Ecjia\App\Memadmin\ConfigurationLoader::singleton();

        $cluster                    = royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);
        $server                     = royalcms('request')->input('server');

        $cluster_list               = Ecjia\App\Memadmin\DataAnalysis::server_clusterSelect('server_select', $cluster, $server, '', 'onchange="changeServer(this)"');
        $clusterlists               = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllClusters();

        $memAdmin                   = new Ecjia\App\Memadmin\MemcacheManager();

        /* Initializing stats & settings array */
        $stats                      = array();
        $slabs                      = array();
        $slabs['total_malloced']    = 0;
        $slabs['total_wasted']      = 0;
        $settings                   = array();
        $status                     = array();
        $uptime                     = array();

        $clusterinfo                = $_ini->cluster($cluster);
        $serverinfo                 = $_ini->server($server);
        /* Ask for a particular cluster stats */
        if ($clusterinfo || $serverinfo) {
            foreach ($clusterinfo as $name => $value) {
                # Getting Stats & Slabs stats
                $data           = array();
                $data['stats']  = $memAdmin->switchServer($value['hostname'], $value['port'])->driver($_ini->get('stats_api'))->getStats();
                $data['slabs']  = Ecjia\App\Memadmin\DataAnalysis::slabs($memAdmin->switchServer($value['hostname'], $value['port'])->driver($_ini->get('slabs_api'))->getSlabs());
                $stats = Ecjia\App\Memadmin\DataAnalysis::merge($stats, $data['stats']);

                # Computing stats
                if (isset($data['slabs']['total_malloced'], $data['slabs']['total_wasted'])) {
                    $slabs['total_malloced']    += $data['slabs']['total_malloced'];
                    $slabs['total_wasted']      += $data['slabs']['total_wasted'];
                }
                $status[$name] = ($data['stats'] != array()) ? $data['stats']['version'] : '';
                $uptime[$name] = ($data['stats'] != array()) ? $data['stats']['uptime'] : '';
            }
        } /* Asking for a server stats */
        if ($clusterinfo && $serverinfo) {
            # Getting Stats & Slabs stats
            $stats      = $memAdmin->switchServer($serverinfo['hostname'], $serverinfo['port'])->driver($_ini->get('stats_api'))->getStats();
            $slabs      = $memAdmin->switchServer($serverinfo['hostname'], $serverinfo['port'])->driver($_ini->get('slabs_api'))->getSlabs();
            $settings   = $memAdmin->switchServer($serverinfo['hostname'], $serverinfo['port'])->driver($_ini->get('stats_api'))->getSettings();
        }

        $get_servers_cluster = !empty($serverinfo) ? 'Server' : 'Cluster';

        /* Stats are well formed    */
        if (!empty($stats)) {
            /* Making cache size stats  */
            $wasted_percent     = sprintf('%.1f', $slabs['total_wasted'] / $stats['limit_maxbytes'] * 100);
            $used_percent       = sprintf('%.1f', ($slabs['total_malloced'] - $slabs['total_wasted']) / $stats['limit_maxbytes'] * 100);
            $free_percent       = sprintf('%.1f', ($stats['limit_maxbytes'] - $slabs['total_malloced']) / $stats['limit_maxbytes'] * 100);

            $this->__formatStatsData($stats, $settings, $slabs);

            $updaime            = Ecjia\App\Memadmin\DataAnalysis::uptime($uptime[$name]);
            $count_cluster      = count($cluster);

            $this->view->assign('count_cluster',          $count_cluster);
            $this->view->assign('updaime',                $updaime);
            $this->view->assign('status',                 $status);
            $this->view->assign('cluster_list',           $cluster_list);
            $this->view->assign('cluster',                $cluster);
            $this->view->assign('wasted_percent',         $wasted_percent);
            $this->view->assign('used_percent',           $used_percent);
            $this->view->assign('free_percent',           $free_percent);
            $this->view->assign('get_hits_percent',       $stats['get_hits_percent']);
            $this->view->assign('get_misses_percent',     $stats['get_misses_percent']);
            $this->view->assign('stats',                  $stats);
            $this->view->assign('clusterlists',           $clusterlists);
            $this->view->assign('get_servers_cluster',    $get_servers_cluster);
            $this->view->assign('server',                 $server);
            $this->view->assign('serverinfo',             $serverinfo);
            $this->view->assign('clusterinfo',            $clusterinfo);

            $this->view->display('server.php');
        } /* Stats are not well formed  */
        else {
            if ($clusterinfo && $serverinfo) {
                $error_server = $server;
            }else{
                $error_server = '所有来自集群 ' . $cluster;
            }
            $last_error=$memAdmin->error()->last();

            $this->view->assign('last_error',     $last_error);
            $this->view->assign('cluster',        $cluster);
            $this->view->assign('server',         $server);
            $this->view->assign('cluster_list',   $cluster_list);
            $this->view->assign('error_server',   $error_server);
            $this->view->assign('clusterlists',   $clusterlists);

            $this->view->display('server_error.php');
        }
    }



    protected function __formatStatsData(& $stats, & $settings, & $slabs)
    {
        /* Analysis */
        $stats = Ecjia\App\Memadmin\DataAnalysis::stats($stats);

        if (isset($stats['delete_hits'])) {
            $stats['delete_hits']                   = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['delete_hits']);
        } else {
            $stats['delete_hits']                   = 'N/A on' . $stats['version'];
        }

        if (isset($stats['delete_misses'])) {
            $stats['delete_misses']                 = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['delete_misses']);
        } else {
            $stats['delete_misses']                 = 'N/A on' . $stats['version'];
        }

        if (isset($stats['delete_hits'])) {
            $stats['delete_rate']                   = $stats['delete_rate'] . ' Request/sec';
        } else {
            $stats['delete_rate']                   = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cas_hits'])) {
            $stats['cas_hits']                      = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['cas_hits']);
        } else {
            $stats['cas_hits']                      = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cas_misses'])) {
            $stats['cas_misses']                    = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['cas_misses']);
        } else {
            $stats['cas_misses']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cas_badval'])) {
            $stats['cas_badval']                    = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['cas_badval']);
        } else {
            $stats['cas_badval']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cas_hits'])) {
            $stats['cas_rate']                      = $stats['cas_rate'] . ' Request/sec';
        } else {
            $stats['cas_rate']                      = 'N/A on' . $stats['version'];
        }

        if (isset($stats['incr_hits'])) {
            $stats['incr_hits']                     = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['incr_hits']);
        } else {
            $stats['incr_hits']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['incr_hits'])) {
            $stats['incr_misses']                   = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['incr_misses']);
        } else {
            $stats['incr_misses']                   = 'N/A on' . $stats['version'];
        }

        if (isset($stats['incr_hits'])) {
            $stats['incr_rate']                     = $stats['incr_rate'] . ' Request/sec';
        } else {
            $stats['incr_rate']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['decr_hits'])) {
            $stats['decr_hits']                     = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['decr_hits']);
        } else {
            $stats['decr_hits']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['decr_misses'])) {
            $stats['decr_misses']                   = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['decr_misses']);
        } else {
            $stats['decr_misses']                   = 'N/A on' . $stats['version'];
        }

        if (isset($stats['decr_hits'])) {
            $stats['decr_rate']                     = $stats['decr_rate'] . ' Request/sec';
        } else {
            $stats['decr_rate']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['touch_hits'])) {
            $stats['touch_hits']                    = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['touch_hits']);
        } else {
            $stats['touch_hits']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['touch_misses'])) {
            $stats['touch_misses']                  = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['touch_misses']);
        } else {
            $stats['touch_misses']                  = 'N/A on' . $stats['version'];
        }

        if (isset($stats['touch_hits'])) {
            $stats['touch_rate']                    = $stats['touch_rate'] . ' Request/sec';
        } else {
            $stats['touch_rate']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cmd_flush'])) {
            $stats['cmd_flush']                     = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['cmd_flush']);
        } else {
            $stats['cmd_flush']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['cmd_flush'])) {
            $stats['flush_rate']                    = $stats['flush_rate'] . ' Request/sec';
        } else {
            $stats['flush_rate']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['listen_disabled_num'])) {
            $stats['listen_disabled_num']           = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['listen_disabled_num']);
        } else {
            $stats['listen_disabled_num']           = 'N/A on' . $stats['version'];
        }

        if (isset($settings['oldest'])) {
            $stats['oldest']                        = Ecjia\App\Memadmin\DataAnalysis::uptime($settings['oldest']);
        } else {
            $stats['oldest']                        = 'N/A on' . $stats['version'];
        }

        if (isset($stats['reclaimed'])) {
            $stats['reclaimed']                     = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['reclaimed']);
        } else {
            $stats['reclaimed']                     = 'N/A on' . $stats['version'];
        }

        if (isset($stats['reclaimed'])) {
            $stats['reclaimed_rate']                = $stats['reclaimed_rate'] . ' Reclaimed/sec';
        } else {
            $stats['reclaimed_rate']                = 'N/A on' . $stats['version'];
        }

        if (isset($stats['expired_unfetched'])) {
            $stats['expired_unfetched']             = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['expired_unfetched']);
        } else {
            $stats['expired_unfetched']             = 'N/A on' . $stats['version'];
        }

        if (isset($stats['evicted_unfetched'])) {
            $stats['evicted_unfetched']             = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['evicted_unfetched']);
        } else {
            $stats['evicted_unfetched']             = 'N/A on' . $stats['version'];
        }

        if (isset($stats['accepting_conns'])) {
            if ($stats['accepting_conns']) {
                $stats['accepting_conns']           = 'Yes';
            } else {
                $stats['accepting_conns']           = 'No';
            }
        } else {
            $stats['accepting_conns']               = 'N/A on ' . $stats['version'];
        }

        if (isset($settings['maxbytes'])) {
            $stats['maxbytes']                      = Ecjia\App\Memadmin\DataAnalysis::byteResize($settings['maxbytes']) . 'Bytes';
        } else {
            $stats['maxbytes']                      = 'N/A on' . $stats['version'];
        }

        if (isset($settings['maxconns'])) {
            $stats['maxconns']                      = $settings['maxconns'];
        } else {
            $stats['maxconns']                      = 'N/A on' . $stats['version'];
        }

        if (isset($settings['tcpport'], $settings['udpport'])) {
            $stats['port']                          = 'TCP : ' . $settings['tcpport'] . ', UDP : ' . $settings['udpport'];
        } else {
            $stats['port']                          = 'N/A on' . $stats['version'];
        }

        if (isset($settings['inter'])) {
            $stats['inter']                         = $settings['inter'];
        } else {
            $stats['inter']                         = 'N/A on' . $stats['version'];
        }

        if (isset($settings['evictions'])) {
            $stats['evictions']                     = ucfirst($settings['evictions']);
        } else {
            $stats['evictions']                     = 'N/A on' . $stats['version'];
        }

        if (isset($settings['domain_socket'])) {
            $stats['domain_socket']                 = $settings['domain_socket'];
        } else {
            $stats['domain_socket']                 = 'N/A on' . $stats['version'];
        }

        if (isset($settings['umask'])) {
            $stats['umask']                         = $settings['umask'];
        } else {
            $stats['umask']                         = 'N/A on' . $stats['version'];
        }

        if (isset($settings['chunk_size'])) {
            $stats['chunk_size']                    = $settings['chunk_size'];
        } else {
            $stats['chunk_size']                    = 'N/A on' . $stats['version'];
        }

        if (isset($settings['growth_factor'])) {
            $stats['growth_factor']                 = $settings['growth_factor'];
        } else {
            $stats['growth_factor']                 = 'N/A on' . $stats['version'];
        }

        if (isset($settings['num_threads'])) {
            $stats['num_threads']                   = $settings['num_threads'];
        } else {
            $stats['num_threads']                   = 'N/A on' . $stats['version'];
        }

        if (isset($settings['detail_enabled'])) {
            $stats['detail_enabled']                = ucfirst($settings['detail_enabled']);
        } else {
            $stats['detail_enabled']                = 'N/A on' . $stats['version'];
        }

        if (isset($settings['reqs_per_event'])) {
            $stats['reqs_per_event']                = $settings['reqs_per_event'];
        } else {
            $stats['reqs_per_event']                = 'N/A on' . $stats['version'];
        }

        if (isset($settings['cas_enabled'])) {
            $stats['cas_enabled']                   = ucfirst($settings['cas_enabled']);
        } else {
            $stats['cas_enabled']                   = 'N/A on' . $stats['version'];
        }

        if (isset($settings['tcp_backlog'])) {
            $stats['tcp_backlog']                   = $settings['tcp_backlog'];
        } else {
            $stats['tcp_backlog']                   = 'N/A on' . $stats['version'];
        }

        if (isset($settings['auth_enabled_sasl'])) {
            $stats['auth_enabled_sasl']             = ucfirst($settings['auth_enabled_sasl']);
        } else {
            $stats['auth_enabled_sasl']             = 'N/A on' . $stats['version'];
        }

        if (isset($stats['hash_power_level'])) {
            $stats['hash_power_level']              = Ecjia\App\Memadmin\DataAnalysis::byteResize($stats['hash_power_level']) . 'Bytes';
        } else {
            $stats['hash_power_level']              = 'N/A on' . $stats['version'];
        }

        if (isset($stats['hash_bytes'])) {
            $stats['hash_bytes']                    = Ecjia\App\Memadmin\DataAnalysis::byteResize($stats['hash_bytes']) . 'Bytes';
        } else {
            $stats['hash_bytes']                    = 'N/A on' . $stats['version'];
        }

        if (isset($stats['hash_is_expanding'])) {
            if ($stats['hash_is_expanding']) {
                $stats['hash_is_expanding']         = 'Yes';
            } else {
                $stats['hash_is_expanding']         = 'No';
            }
        } else {
            $stats['hash_is_expanding']             = 'N/A on ' . $stats['version'];
        }

        if (isset($stats['slabs_moved'])) {
            $stats['slabs_moved']                   = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['slabs_moved']);
        } else {
            $stats['slabs_moved']                   = 'N/A on ' . $stats['version'];
        }

        if (isset($stats['slab_reassign_running'])) {
            if ($stats['slab_reassign_running']) {
                $stats['slab_reassign_running']     = 'Yes';
            } else {
                $stats['slab_reassign_running']     = 'No';
            }
        } else {
            $stats['slab_reassign_running']         = 'N/A on ' . $stats['version'];
        }

        $stats['get_hits']              = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['get_hits']);
        $stats['get_misses']            = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['get_misses']);
        $stats['cmd_set']               = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['cmd_set']);
        $stats['uptime']                = Ecjia\App\Memadmin\DataAnalysis::uptime($stats['uptime']);
        $stats['total_connections']     = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['total_connections']);
        $stats['curr_items']            = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['curr_items']);
        $stats['total_items']           = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['total_items']);
        $stats['evictions']             = Ecjia\App\Memadmin\DataAnalysis::hitResize($stats['evictions']);
        $stats['bytes_read']            = Ecjia\App\Memadmin\DataAnalysis::byteResize($stats['bytes_read']);
        $stats['bytes_written']         = Ecjia\App\Memadmin\DataAnalysis::byteResize($stats['bytes_written']);

        /* Fixing issue 163, some results from stats slabs mem_requested are buggy @FIXME   */
        if ($slabs['total_malloced'] > $stats['limit_maxbytes']) {
            $slabs['total_wasted']      = $stats['limit_maxbytes'] - ($slabs['total_malloced'] - $slabs['total_wasted']);
            $slabs['total_malloced']    = $stats['limit_maxbytes'];
        }
        $stats['total_malloced']        = Ecjia\App\Memadmin\DataAnalysis::byteResize($slabs['total_malloced']);
        $stats['limit_maxbytes']        = Ecjia\App\Memadmin\DataAnalysis::byteResize($stats['limit_maxbytes']);
        $stats['total_wasted']          = Ecjia\App\Memadmin\DataAnalysis::byteResize($slabs['total_wasted']);
    }



    public function slabs()
    {
        /* Loading ini file */
        $_ini           = Ecjia\App\Memadmin\ConfigurationLoader::singleton();

        $memAdmin       = new Ecjia\App\Memadmin\MemcacheManager();
        $cluster        = royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);
        $server         = royalcms('request')->input('server');
//dd($cluster);
        $cluster_list   = Ecjia\App\Memadmin\DataAnalysis::server_clusterSelect('slab_select', $cluster, $server, 'btn list', 'onchange="changeServerSlab(this)"');
        $clusterlists               = Ecjia\App\Memadmin\MemcacheServer::singleton()->getAllClusters();

        /* Ask for one server and one slabs items */
        if (isset($server) && ($serverinfo = $_ini->server($server))) {
            $slabs      = $memAdmin->switchServer($serverinfo['hostname'], $serverinfo['port'])->driver($_ini->get('slabs_api'))->getSlabs();
        }

        /* Items are well formed */
        if ($slabs !== false) {
            $slabs              = Ecjia\App\Memadmin\DataAnalysis::slabs($slabs);
            $total_malloced     = Ecjia\App\Memadmin\DataAnalysis::byteResize($slabs['total_malloced']) . Bytes;
            $total_wasted       = Ecjia\App\Memadmin\DataAnalysis::byteResize($slabs['total_wasted']) . Bytes;
            $chunk_size         = Ecjia\App\Memadmin\DataAnalysis::byteResize($slabs['chunk_size']) . Bytes;
            $active_slabs       = $slabs['active_slabs'];
            /* Showing items */
            foreach ($slabs as $id => $slab) {
                $slabs[$id]['chunk_size']                   = Ecjia\App\Memadmin\DataAnalysis::byteResize($slab['chunk_size']) . Bytes;
                $slabs[$id]['used_chunks']                  = Ecjia\App\Memadmin\DataAnalysis::hitResize($slab['used_chunks']);
                $slabs[$id]['total_chunks']                 = Ecjia\App\Memadmin\DataAnalysis::hitResize($slab['total_chunks']);
                $slabs[$id]['used_chunks_total_chunks']     = Ecjia\App\Memadmin\DataAnalysis::valueResize($slab['used_chunks'] / $slab['total_chunks'] * 100) . '%';
                $slabs[$id]['mem_wasted']                   = Ecjia\App\Memadmin\DataAnalysis::byteResize($slab['mem_wasted']) . Bytes;
                $slabs[$id]['request_rate']                 = ($slab['request_rate'] > 999) ? Library_Data_Analysis::hitResize($slab['request_rate']) : $slab['request_rate'] . Request / sec;
                $slabs[$id]['items_evicted']                = isset($slab['items:evicted']) ? $slab['items:evicted'] : 'N/A';
                $slabs[$id]['uptime_items_evicted']         = Ecjia\App\Memadmin\DataAnalysis::uptime($slab['items:evicted']);
            };

            $this->view->assign('cluster_list',       $cluster_list);
            $this->view->assign('total_malloced',     $total_malloced);
            $this->view->assign('total_wasted',       $total_wasted);
            $this->view->assign('chunk_size',         $chunk_size);
            $this->view->assign('active_slabs',       $active_slabs);
            $this->view->assign('server',             $server);
            $this->view->assign('cluster',            $cluster);
            $this->view->assign('slabs',              $slabs);

            $this->view->display('server_slabs.php');
        }         /* Items are not well formed */
        else {
            if ($serverinfo) {
                $error_server = $server;
            }else{
                $error_server = '所有来自集群 ' . $cluster;
            }
            $last_error=$memAdmin->error()->last();

            $this->view->assign('last_error',     $last_error);
            $this->view->assign('cluster',        $cluster);
            $this->view->assign('server',         $server);
            $this->view->assign('cluster_list',   $cluster_list);
            $this->view->assign('error_server',   $error_server);
            $this->view->assign('slabs',              $slabs);
            $this->view->assign('clusterlists',   $clusterlists);
            $this->view->display('server_error.php');
        }
        unset($items);
    }

    public function items()
    {
        $this->view->assign('command_url', RC_Uri::url('memadmin/server/execute_command/'));

        /* Loading ini file */
        $_ini           = Ecjia\App\Memadmin\ConfigurationLoader::singleton();
        $_config        = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $get_slab       = royalcms('request')->input('slab');
        $cluster        = royalcms('request')->input('cluster', Ecjia\App\Memadmin\MemcacheServer::DEFAULT_CLUSTER);
        $server         = royalcms('request')->input('server');

        $items          = false;

        $memAdmin       = new Ecjia\App\Memadmin\MemcacheManager();

        /* Ask for one server and one slabs items */
        $serverinfo     = $_ini->server($server);
        if ($serverinfo) {
            $items      = $memAdmin->switchServer($serverinfo['hostname'], $serverinfo['port'])->driver($_ini->get('items_api'))->getItems($get_slab);
        }

        /* Items are well formed */
        if (! empty($items)) {
            /* Showing items */
            $max_item_dump      = $_config->get('max_item_dump');
            foreach ($items as $key => $data) {
                $items[$key]['size']     = Ecjia\App\Memadmin\DataAnalysis::byteResize($data[0]) . Bytes;
                $items[$key]['uptime']     = Ecjia\App\Memadmin\DataAnalysis::uptime($data[1] - time());
                $items[$key]['format_key'] = (strlen($key) > 70) ? substr($key, 0, 70) . '[..]' : $key;
            }

            $this->view->assign('get_slab',       $get_slab);
            $this->view->assign('cluster',        $cluster);
            $this->view->assign('server',         $server);
            $this->view->assign('items',          $items);
            $this->view->assign('max_item_dump',  $max_item_dump);

            $this->view->display('server_items.php');
        }elseif ($items === false){
            $this->view->assign('get_slab',       $get_slab);
            $this->view->assign('cluster',        $cluster);
            $this->view->assign('server',         $server);

            $this->view->display('server_items.php');
        }
        /* Items are not well formed */
        else {
            $this->view->display('server_error.php');
        }
    }

    public function execute_command()
    {
        $_ini               = Ecjia\App\Memadmin\ConfigurationLoader::singleton();
        $_config            = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $request_server     = royalcms('request')->input('request_server');
        $server             = $_ini->server($request_server);
        $request_api        = $_config->get('get_api');
        $request_key        = UrlDecode(royalcms('request')->input('request_key'));
        $memAdmin           = new Ecjia\App\Memadmin\MemcacheCommand();
        $data               = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->get($request_key);
        $content            = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);

//        return $this->displayContent($content);
        echo $content;
    }


}

// end