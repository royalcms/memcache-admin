<?php


namespace Ecjia\App\Test\Controllers;


use Ecjia\System\BaseController\EcjiaFrontController;

class IndexController extends EcjiaFrontController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        return "Hello Test!!!";
    }

}