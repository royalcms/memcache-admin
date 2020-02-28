<?php

return array(
    /**
     * server
     */
    'server' => array(
        'name' => 'server',
        'title' => '服务器信息',
        'desc' => '服务器信息',
        'url' => RC_Uri::url("memadmin/index/init/")
    ),

    /**
     * monitor
     */
    'monitor' => array(
        'name' => 'monitor',
        'title' => '性能监控',
        'desc' => '性能监控',
        'url' => RC_Uri::url("memadmin/monitor/init/")
    ),

    /**
     * command
     */
    'command' => array(
        'name' => 'command',
        'title' => '终端控制台',
        'desc' => '终端控制台',
        'url' => RC_Uri::url("memadmin/command/init/")
    ),

    /**
     * clusters
     */
    'clusters' => array(
        'name' => 'clusters',
        'title' => '集群管理',
        'desc' => '集群管理',
        'url' => RC_Uri::url("memadmin/clusters/init/")
    ),
);