<?php

namespace App\Memadmin;

use RC_Session;
use Royalcms\Component\Foundation\RoyalcmsObject;

class MemcacheMonitorConfig extends RoyalcmsObject
{
    
    protected  static $configs = [];
    
    protected $ConfigurationLoader;
    
    const STORAGE_KEY = 'memcache_monitors';
    
    
    public function __construct()
    {
        $data = $this->getMonitorConfig();

        if (empty(self::$configs)) {
            self::$configs = $data;
        }
        
        $this->ConfigurationLoader = ConfigurationLoader::singleton();
    }
    
    
    public function set($name, $value)
    {
        self::$configs[$name] = $value;
        
        $this->saveMonitorConfig();
        
        return $this;
    }
    
    
    public function get($name)
    {
        $data = array_get(self::$configs, $name);
        if (empty($data)) {
            return $this->ConfigurationLoader->get($name);
        } else {
            return $data;
        }
    }
    
    
    public function all()
    {
        return self::$configs;
    }
    
    
    public function saveMonitorConfig()
    {
        RC_Session::put(self::STORAGE_KEY, serialize(self::$configs));
        
        return $this;
    }
    
    
    public function getMonitorConfig()
    {
        $data = RC_Session::get(self::STORAGE_KEY, null);

        return  unserialize($data);
    }
    

}

// end