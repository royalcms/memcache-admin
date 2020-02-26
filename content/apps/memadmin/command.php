<?php

define('APP_NAME', 'MEMADMIN');
define('APP_VERSION', '2.0');

RC_Session::start();

class command extends Royalcms\Component\Routing\Controller
{

    protected $view;

    function __construct()
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
        $this->view->assign('service',          'command');
    }

    public function init()
    {
        $this->view->assign('command_url', RC_Uri::url('memadmin/command/execute_command'));

        $_ini               = Ecjia\App\Memadmin\MemcacheMonitorConfig::singleton();

        $request_server     = Ecjia\App\Memadmin\DataAnalysis::serverSelect('request_server', '', 'form-control');
        $request_api        = Ecjia\App\Memadmin\DataAnalysis::apiList($_ini->get('get_api'), 'request_api', 'form-control');

        $this->view->assign('request_server',     $request_server);
        $this->view->assign('request_api',        $request_api);

        $this->view->display('command.php');
    }

    public function telnet()
    {
        $this->view->assign('telnet_url', RC_Uri::url('memadmin/command/execute_telnet'));

        $request_telnet_server  = Ecjia\App\Memadmin\DataAnalysis::serverSelect('request_telnet_server', '', 'form-control');

        $this->view->assign('request_telnet_server',  $request_telnet_server);

        $this->view->display('command_telnet.php');
    }

    public function search()
    {
        $this->view->assign('search_url', RC_Uri::url('memadmin/command/execute_search'));

        $search_server  = Ecjia\App\Memadmin\DataAnalysis::serverSelect('search_server', '', 'form-control');


        $this->view->assign('search_server',  $search_server);

        $this->view->display('command_search.php');
    }

    public function execute_command()
    {
        $request            = royalcms('request')->input('request_command');
        $request_api        = royalcms('request')->input('request_api');
        $request_server     = royalcms('request')->input('request_server');

        $memAdmin = new Ecjia\App\Memadmin\MemcacheCommand();

        try {

            switch ($request) {
                /* Memcache::get command */
                case 'get' :
                    $request_key    = royalcms('request')->input('request_key');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $memAdmin) {
                        if (empty($request_key)) {
                            $data   = '请输入Key';
                        } else {
                            $data   = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->get($request_key);
                        }

                        $content    = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;


                /* Memcache::set command */
                case 'set' :

                    $request_key        = royalcms('request')->input('request_key');
                    $request_data       = royalcms('request')->input('request_data');
                    $request_duration   = royalcms('request')->input('request_duration');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_data, $request_duration, $memAdmin) {
                        if (empty($request_key)) {
                            $data       = '请输入Key';
                        }
                        else if (empty($request_duration)) {
                            $data       = '请输入Duration';
                        }
                        else if (empty($request_data)) {
                            $data       = '请输入Data';
                        }
                        else {
                            $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->set($request_key, $request_data, $request_duration);
                        }

                        $content        = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::delete command */
                case 'delete' :

                    $request_key = royalcms('request')->input('request_key');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $memAdmin) {
                        if (empty($request_key)) {
                            $data       = '请输入Key';
                        } else {
                            $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->delete($request_key);
                        }

                        $content        = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::decrement command  */
                case 'increment' :
                    $request_key        = royalcms('request')->input('request_key');
                    $request_value      = royalcms('request')->input('request_value');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_value, $memAdmin) {
                        if (empty($request_key)) {
                            $data       = '请输入Key';
                        }
                        else if (empty($request_value)) {
                            $data       = '请输入Value';
                        }
                        else {
                            /* Checking value   */
                            if (empty($request_value) || !is_numeric($request_value)) {
                                $request_value  = 1;
                            }

                            $data               = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->increment($request_key, $request_value);
                        }

                        $content = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::decrement command */
                case 'decrement' :
                    $request_key        = royalcms('request')->input('request_key');
                    $request_value      = royalcms('request')->input('request_value');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_value, $memAdmin) {
                        if (empty($request_key)) {
                            $data   = '请输入Key';
                        }
                        else if (empty($request_value)) {
                            $data   = '请输入Value';
                        }
                        else {
                            /* Checking value   */
                            if (empty($request_value) || !is_numeric($request_value)) {
                                $request_value = 1;
                            }

                            $data   = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->decrement($request_key, $request_value);
                        }

                        $content    = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::flush_all command  */
                case 'flush_all' :

                    $request_delay  = royalcms('request')->input('request_delay');

                    with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_delay, $memAdmin) {
                        if (empty($request_delay)) {
                            $data   = '请输入Delay';
                        } else {
                            /* Checking delay   */
                            if (empty($request_delay) || !is_numeric($request_delay)) {
                                $request_delay = 0;
                            }

                            $data   = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->flushAll($request_delay);
                        }

                        $content    = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;
            }

        } catch (Exception $e) {

            $content = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $e->getMessage());
            return $this->displayContent($content);
        }
    }

    public function execute_telnet()
    {
        $request_api        = 'Server';

        $memAdmin           = new Ecjia\App\Memadmin\MemcacheCommand();

        $request_telnet     = royalcms('request')->input('request_telnet');
        $request_server     = royalcms('request')->input('request_server');

        with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_telnet, $memAdmin) {
            if (empty($request_telnet)) {
                $data       = '请输入Telnet命令';
            } else {
                $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->telnet($request_telnet);
            }

            $content        = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
            echo $content;
        });
    }

    public function execute_search()
    {
        $request_api        = 'Server';

        $memAdmin           = new Ecjia\App\Memadmin\MemcacheManager();

        $request_key        = royalcms('request')->input('request_key');
        $request_level      = royalcms('request')->input('request_level', false);
        $request_more       = royalcms('request')->input('request_more', false);
        $request_server     = royalcms('request')->input('request_server');

        with(new Ecjia\App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_level, $request_more, $memAdmin) {
            if (empty($request_key)) {
                $data       = '请输入Key';
            } else {
                $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->search($request_key, $request_level, $request_more);
            }

            $content        = Ecjia\App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
            echo $content;
        });
    }

}

//end