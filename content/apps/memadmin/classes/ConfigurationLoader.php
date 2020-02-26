<?php

namespace App\Memadmin;

use RC_Package;

class ConfigurationLoader
{

    /**
     * Singleton
     * @var unknown
     */
    protected static $_instance = null;

    /**
     * Configuration needed keys and default values
     * @var array
     */
    protected static $_iniKeys = array(
        'stats_api'         => 'Server',
        'slabs_api'         => 'Server',
        'items_api'         => 'Server',
        'get_api'           => 'Server',
        'set_api'           => 'Server',
        'delete_api'        => 'Server',
        'flush_all_api'     => 'Server',
        'connection_timeout' => 1,
        'max_item_dump'     => 100,
        'refresh_rate'      => 10,
        'memory_alert'      => 80,
        'hit_rate_alert'    => 90,
        'eviction_alert'    => 0,
        'file_path'         => '',
    );

    /**
     * Storage
     * @var unknown
     */
    protected static $_ini = array();

    /**
     * Constructor, load configuration file and parse server list
     *
     * @return Void
     */
    protected function __construct()
    {
        self::$_ini = RC_Package::package('app::memadmin')->loadConfig('memcache');
        /* Checking ini File */
        if (empty(self::$_ini)) {
            /* Fallback */
            self::$_iniKeys['file_path'] = storage_path('temp/memcache/');
            self::$_ini = self::$_iniKeys;
        }
    }

    /**
     * Get Library_Configuration_Loader singleton
     *
     * @return \Ecjia\App\Memadmin\ConfigurationLoader
     */
    public static function singleton()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    /**
     * Config key to retrieve
     * Return the value, or false if does not exists
     *
     * @param String $key Key to get
     *
     * @return Mixed
     */
    public function get($key, $default = null)
    {
        return array_get(self::$_ini, $key, $default);
    }


    /**
     * Config key to set
     *
     * @param String $key Key to set
     * @param Mixed $value Value to set
     *
     * @return Boolean
     */
    public function set($key, $value)
    {
        self::$_ini[$key] = $value;
    }

    /**
     * Check if every ini keys are set
     * Return true if ini is correct, false otherwise
     *
     * @return Boolean
     */
    public function check()
    {
        /* Checking configuration keys */
        foreach (array_keys(self::$_iniKeys) as $iniKey) {
            /* Ini file key not set */
            if (isset(self::$_ini[$iniKey]) === false) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $server
     * @return array
     */
    public function server($server)
    {
        $serverlists = MemcacheServer::singleton()->getAllServers();
        foreach ($serverlists as $cluster => $servers) {
            if (isset($serverlists[$cluster][$server])) {
                return $serverlists[$cluster][$server];
            }
        }
        return array();
    }

    /**
     * Servers to retrieve from cluster
     * Return the value, or false if does not exists
     *
     * @param String $cluster Cluster to retreive
     *
     * @return Array
     */
    public function cluster($cluster)
    {
        $serverlists = MemcacheServer::singleton()->getAllServers();
        if (isset($serverlists[$cluster])) {
            return $serverlists[$cluster];
        }
        return array();
    }

    /**
     * Write ini file
     * Return true if written, false otherwise
     *
     * @return Boolean
     */
    public function write()
    {
        if ($this->check()) {
            return is_numeric(file_put_contents(self::$_iniPath, '<?php' . PHP_EOL . 'return ' . var_export(self::$_ini, true) . ';'));
        }
        return false;
    }
}

// end