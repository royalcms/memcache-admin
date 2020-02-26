<?php

namespace App\Memadmin\Controllers;

define('APP_NAME', 'MEMADMIN');
define('APP_VERSION', '3.0');

use RC_Session;
use RC_Theme;
use Royalcms\Component\Routing\Controller as BaseController;

class FrontBase extends BaseController
{
    protected $__FILE__;

    protected $view;

    public function __construct()
    {
        $this->__FILE__ = dirname(dirname(__FILE__));

        $this->registerViewServiceProvider();

        header('content-type: text/html; charset=' . RC_CHARSET);
        header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');

        RC_Session::start();
    }

    protected function registerViewServiceProvider()
    {
        royalcms()->forgeRegister('Royalcms\Component\SmartyView\SmartyServiceProvider');

        $this->view = $this->createViewInstance();
    }

    protected function createViewInstance()
    {
        $view = royalcms('view')->getSmarty();
        // 模板目录
        $view->setTemplateDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR);
        $view->addPluginsDir(SITE_THEME_PATH . RC_Theme::get_template() . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR);
        $view->assign('theme_url', RC_Theme::get_template_directory_uri() . '/');

        return $view;
    }
}