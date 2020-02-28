<?php

return array(
    'identifier'    => 'royalcms/app-memadmin',
    'directory'     => 'memadmin',
    'name'          => __('MemAdmin', 'memadmin'),
    'description'   => __('MemAdmin web界面管理工具', 'memadmin'), 			/* 描述对应的语言项 */
    'author' 	    => 'ROYALCMS TEAM', 			/* 作者 */
    'website' 	    => 'http://www.royalcms.cn', 	/* 网址 */
    'version' 	    => '6.0.0', 					/* 版本号 */
    'copyright'     => 'ROYALCMS Copyright 2020.',
    'namespace'     => 'App\Memadmin',
    'provider'      => 'MemadminServiceProvider',
    'autoload'    => array(
        'psr-4' => array(
            "App\\Memadmin\\" => "classes/"
        )
    ),
    'discover'    => array(
        'providers' => array(
            "App\\Memadmin\\MemadminServiceProvider"
        ),
        'aliases'   => [

        ]
    ),
);

// end
