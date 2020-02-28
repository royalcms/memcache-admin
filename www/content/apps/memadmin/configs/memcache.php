<?php

return array(
    'stats_api'               => 'Server',
    'slabs_api'               => 'Server',
    'items_api'               => 'Server',
    'get_api'                 => 'Server',
    'set_api'                 => 'Server',
    'add_api'                 => 'Server',
    'replace_api'             => 'Server',
    'delete_api'              => 'Server',
    'flush_api'               => 'Server',
    'connection_timeout'      => '1',
    'max_item_dump'           => '100',
    'refresh_rate'            => '10',
    'memory_alert'            => '80',
    'hit_rate_alert'          => '90',
    'eviction_alert'          => '0',
    'file_path'               => storage_path('temp/memcache/'),
);