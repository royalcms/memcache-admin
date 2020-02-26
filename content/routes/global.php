<?php

use Royalcms\Component\Support\Facades\Royalcms;

// 请求数据自动转义
$_POST      = rc_addslashes($_POST);
$_GET       = rc_addslashes($_GET);
$_REQUEST   = rc_addslashes($_REQUEST);
$_COOKIE    = rc_addslashes($_COOKIE);

// Load the default text localization domain.
RC_Locale::loadDefaultTextdomain();

//加载项目函数库
RC_Loader::load_sys_func('functions');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

Royalcms::error(function(Exception $exception)
{
    $err = array(
        'file'      => $exception->getFile(),
        'line'      => $exception->getLine(),
        'code'      => $exception->getCode(),
        'url'       => RC_Request::fullUrl(),
    );

    RC_Logger::getLogger(RC_Logger::LOG_ERROR)->error($exception->getMessage(), $err);
});
Royalcms::error(function(ErrorException $exception)
{
    $err = array(
        'file'      => $exception->getFile(),
        'line'      => $exception->getLine(),
        'code'      => $exception->getCode(),
        'url'       => RC_Request::fullUrl(),
    );

    RC_Logger::getLogger(RC_Logger::LOG_ERROR)->error($exception->getMessage(), $err);
    royalcms('sentry')->captureException($exception);
});
Royalcms::fatal(function(\Symfony\Component\Debug\Exception\FatalErrorException $exception)
{
    $err = array(
        'file'      => $exception->getFile(),
        'line'      => $exception->getLine(),
        'code'      => $exception->getCode(),
        'url'       => RC_Request::fullUrl(),
    );

    RC_Logger::getLogger(RC_Logger::LOG_ERROR)->error($exception->getMessage(), $err);
    royalcms('sentry')->captureException($exception);
});
Royalcms::error(function(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception)
{
    $err = array(
        'file'      => $exception->getFile(),
        'line'      => $exception->getLine(),
        'code'      => $exception->getCode(),
        'url'       => RC_Request::fullUrl(),
    );
    RC_Logger::getLogger(RC_Logger::LOG_ERROR)->error($exception->getMessage(), $err);
    royalcms('sentry')->captureException($exception);
    //404 tips
    _404($exception->getMessage());
});
Royalcms::error(function(\Symfony\Component\HttpKernel\Exception\HttpException $exception)
{
    $err = array(
        'file'      => $exception->getFile(),
        'line'      => $exception->getLine(),
        'code'      => $exception->getCode(),
        'url'       => RC_Request::fullUrl(),
    );

    RC_Logger::getLogger(RC_Logger::LOG_ERROR)->error($exception->getMessage(), $err);
    royalcms('sentry')->captureException($exception);
    //404 tips
    _404($exception->getMessage());
});


/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

Royalcms::down(function()
{
    return RC_Response::make("Be right back!", 503);
});

Royalcms::missing(function($exception)
{
    return RC_Response::make('404 Not Found', 404);
});

/**
 * Fires after Royalcms has finished loading but before any headers are sent.
 *
 * @since 1.5.0
 */
RC_Hook::do_action('ecjia_loading');

RC_Hook::do_action('ecjia_loading_after');

// end