<?php return array (
  'royalcms/app' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\App\\AppServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_App' => 'Royalcms\\Component\\App\\Facades\\App',
    ),
  ),
  'royalcms/default-route' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\DefaultRoute\\DefaultRouteServiceProvider',
    ),
    'aliases' => 
    array (
    ),
  ),
  'royalcms/environment' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Environment\\EnvironmentServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_ENV' => 'Royalcms\\Component\\Environment\\Facades\\Environment',
    ),
  ),
  'royalcms/error' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Error\\ErrorServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Error' => 'Royalcms\\Component\\Error\\Facades\\Error',
    ),
  ),
  'royalcms/gettext' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Gettext\\GettextServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Gettext' => 'Royalcms\\Component\\Gettext\\Facades\\Gettext',
    ),
  ),
  'royalcms/hook' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Hook\\HookServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Hook' => 'Royalcms\\Component\\Hook\\Facades\\Hook',
    ),
  ),
  'royalcms/memcache' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Memcache\\MemcacheServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Memcache' => 'Royalcms\\Component\\Memcache\\Facades\\Memcache',
    ),
  ),
  'royalcms/native-session' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\NativeSession\\NativeSessionServiceProvider',
    ),
    'aliases' => 
    array (
    ),
  ),
  'royalcms/package' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Package\\PackageServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Package' => 'Royalcms\\Component\\Package\\Facades\\Package',
    ),
  ),
  'royalcms/purifier' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Purifier\\PurifierServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Purifier' => 'Royalcms\\Component\\Purifier\\Facades\\Purifier',
    ),
  ),
  'royalcms/script' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Script\\ScriptServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Script' => 'Royalcms\\Component\\Script\\Facades\\Script',
      'RC_Style' => 'Royalcms\\Component\\Script\\Facades\\Style',
    ),
  ),
  'royalcms/sentry' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Sentry\\SentryServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Sentry' => 'Royalcms\\Component\\Sentry\\Facades\\Sentry',
    ),
  ),
  'royalcms/tail' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Tail\\TailServiceProvider',
    ),
    'aliases' => 
    array (
    ),
  ),
  'royalcms/timer' => 
  array (
    'providers' => 
    array (
      0 => 'Royalcms\\Component\\Timer\\TimerServiceProvider',
    ),
    'aliases' => 
    array (
      'RC_Timer' => 'Royalcms\\Component\\Timer\\Facades\\Timer',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
);