<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Royalcms the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//rewrite
//RC_Rewrite::add_rewrite_rule('^admincp/([^/]*)/([^/]*)/?', 'index.php?m=admincp&c=$matches[1]&a=$matches[2]', 'top');
//$rules = $royalcms['config']['route.rules'];
//collect($rules)->each(function ($item, $key) {
//    RC_Rewrite::add_rewrite_rule($key, $item, 'top');
//    return true;
//});

// in config/Routes.php
RC_Route::addRoute(['GET', 'HEAD'], '/liveness', 'Kernel\Http\Controllers\HealthCheckController@liveness');
RC_Route::addRoute(['GET', 'HEAD'], '/readiness', 'Kernel\Http\Controllers\HealthCheckController@readiness');

RC_Route::any('/', function()
{
    $app = new \Royalcms\Component\App\AppControllerDispatcher();
    return $app->dispatch();
});

// 使用mca URL querystring普通路由
RC_Route::pattern('url', '.+');
RC_Route::any('{url}', function($url)
{
    $app = new \Royalcms\Component\App\AppControllerDispatcher();
    return $app->dispatch();
});

// v2 api
//RC_Route::prefix('v2')->group(function () {
//    RC_Route::any('{url}', function()
//    {
//        $app = new \Royalcms\Component\App\AppControllerDispatcher();
//        return $app->dispatch();
//    });
//});

// end