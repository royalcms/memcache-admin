<?php

return array(
    /*
     ******************************** 基本配置 ********************************
     */
    //网站时区，Etc/GMT-8 实际表示的是 GMT+8 timezone
    'timezone' 						=> env('TIMEZONE', 'Etc/GMT-8'), 		
    //网站语言包
    'locale' 						=> env('LOCALE', 'zh_CN'), //zh_CN, en_US, zh_TW
    //是否Gzip压缩后输出
    'gzip' 							=> 0, 					

    //API密钥
    'api_secret'                    => env('AUTH_SECRET', 'UbGuq4G8unKHhiRnqk9yRKHhiRnKHhiR'),
    //API compatible
    'api_sign_compatible'           => true,

    //密钥
    'auth_key' 						=> env('AUTH_KEY', 'UbGuq4G8uqk9yRKHhiRnUbGuq4G8uqk9'),
    'cipher'                        => 'AES-256-CBC',

    //调试开关
    'debug'                         => env('DEBUG', false),


    'admin_entrance'				=> 'admincp',
	
	'admin_enable'					=> true,

    /*
     ********************************URL路由*******************************
     */
    //URL重写模式
    'url_rewrite'					=> false,		
    //URL模式（normal：普通模式 pathinfo：PATHINFO模式 cli：命令行模式）
    'url_mode'						=> 'normal',			
		
	
    /*
     ******************************** 模板参数 *******************************
     */
    //
    'tpl_force_specify'             => false,
    //风格
    'tpl_style'                     => 'default',  
    // 信息提示模板
    'tpl_message'                   => 'showmessage.dwt.php',
    
	'tpl_usedfront'					=> true,

);

// end