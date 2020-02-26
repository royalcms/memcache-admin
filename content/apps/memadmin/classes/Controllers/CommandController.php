<?php

namespace App\Memadmin\Controllers;

use RC_Session;
use RC_Uri;

class CommandController extends FrontBase
{

    public function __construct()
    {
        parent::__construct();

        $memadmingroup = config('app-memadmin::memadmingroup');
        $this->view->assign('memadmingroup',    $memadmingroup);
        $this->view->assign('service',          'command');
    }

    public function init()
    {
        $this->view->assign('command_url', RC_Uri::url('memadmin/command/execute_command'));

        $_ini               = \App\Memadmin\MemcacheMonitorConfig::singleton();

        $request_server     = \App\Memadmin\DataAnalysis::serverSelect('request_server', '', 'form-control');
        $request_api        = \App\Memadmin\DataAnalysis::apiList($_ini->get('get_api'), 'request_api', 'form-control');

        $this->view->assign('request_server',     $request_server);
        $this->view->assign('request_api',        $request_api);

        $this->view->display('command.php');
    }

    public function telnet()
    {
        $this->view->assign('telnet_url', RC_Uri::url('memadmin/command/execute_telnet'));

        $request_telnet_server  = \App\Memadmin\DataAnalysis::serverSelect('request_telnet_server', '', 'form-control');

        $this->view->assign('request_telnet_server',  $request_telnet_server);

        $this->view->display('command_telnet.php');
    }

    public function search()
    {
        $this->view->assign('search_url', RC_Uri::url('memadmin/command/execute_search'));

        $search_server  = \App\Memadmin\DataAnalysis::serverSelect('search_server', '', 'form-control');


        $this->view->assign('search_server',  $search_server);

        $this->view->display('command_search.php');
    }

    public function execute_command()
    {
        $request            = royalcms('request')->input('request_command');
        $request_api        = royalcms('request')->input('request_api');
        $request_server     = royalcms('request')->input('request_server');

        $memAdmin = new \App\Memadmin\MemcacheCommand();

        try {

            switch ($request) {
                /* Memcache::get command */
                case 'get' :
                    $request_key    = royalcms('request')->input('request_key');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $memAdmin) {
                        if (empty($request_key)) {
                            $data   = '请输入Key';
                        } else {
                            $data   = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->get($request_key);
                        }

                        $content    = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;


                /* Memcache::set command */
                case 'set' :

                    $request_key        = royalcms('request')->input('request_key');
                    $request_data       = royalcms('request')->input('request_data');
                    $request_duration   = royalcms('request')->input('request_duration');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_data, $request_duration, $memAdmin) {
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

                        $content        = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::delete command */
                case 'delete' :

                    $request_key = royalcms('request')->input('request_key');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $memAdmin) {
                        if (empty($request_key)) {
                            $data       = '请输入Key';
                        } else {
                            $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->delete($request_key);
                        }

                        $content        = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::decrement command  */
                case 'increment' :
                    $request_key        = royalcms('request')->input('request_key');
                    $request_value      = royalcms('request')->input('request_value');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_value, $memAdmin) {
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

                        $content = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::decrement command */
                case 'decrement' :
                    $request_key        = royalcms('request')->input('request_key');
                    $request_value      = royalcms('request')->input('request_value');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_value, $memAdmin) {
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

                        $content    = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;

                /* Memcache::flush_all command  */
                case 'flush_all' :

                    $request_delay  = royalcms('request')->input('request_delay');

                    with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_delay, $memAdmin) {
                        if (empty($request_delay)) {
                            $data   = '请输入Delay';
                        } else {
                            /* Checking delay   */
                            if (empty($request_delay) || !is_numeric($request_delay)) {
                                $request_delay = 0;
                            }

                            $data   = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->flushAll($request_delay);
                        }

                        $content    = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
                        echo $content;
                    });

                    break;
            }

        } catch (\Exception $e) {

            $content = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $e->getMessage());
            return $this->displayContent($content);
        }
    }

    public function execute_telnet()
    {
        $request_api        = 'Server';

        $memAdmin           = new \App\Memadmin\MemcacheCommand();

        $request_telnet     = royalcms('request')->input('request_telnet');
        $request_server     = royalcms('request')->input('request_server');

        with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_telnet, $memAdmin) {
            if (empty($request_telnet)) {
                $data       = '请输入Telnet命令';
            } else {
                $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->telnet($request_telnet);
            }

            $content        = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
            echo $content;
        });
    }

    public function execute_search()
    {
        $request_api        = 'Server';

        $memAdmin           = new \App\Memadmin\MemcacheManager();

        $request_key        = royalcms('request')->input('request_key');
        $request_level      = royalcms('request')->input('request_level', false);
        $request_more       = royalcms('request')->input('request_more', false);
        $request_server     = royalcms('request')->input('request_server');

        with(new \App\Memadmin\MemcacheServer())->clusterSend($request_server, function($server) use ($request_api, $request_key, $request_level, $request_more, $memAdmin) {
            if (empty($request_key)) {
                $data       = '请输入Key';
            } else {
                $data       = $memAdmin->switchServer($server['hostname'], $server['port'], $request_api)->search($request_key, $request_level, $request_more);
            }

            $content        = \App\Memadmin\DataAnalysis::serverResponse($server['hostname'], $server['port'], $data);
            echo $content;
        });
    }

}

//end