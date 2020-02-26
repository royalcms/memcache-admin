<?php

namespace Ecjia\App\Memadmin;

class MemcacheManager
{
    
    protected $memcache;
    
    public function __construct()
    {
        $this->memcache = royalcms('memcache');
        
        $config = MemcacheMonitorConfig::singleton();
        
        royalcms('config')->set('memcache::config.connection_timeout', $config->get('connection_timeout'));
        royalcms('config')->set('memcache::config.max_item_dump', $config->get('max_item_dump'));
    }
    
    /**
     * Send stats command to server
     * Return the result if successful or false otherwise
     *
     * @return Array|Boolean
     */
    public function getStats()
    {
        return $this->memcache->stats();
    }
    
    /**
     * Send stats cachedump command to server to retrieve slabs items
     * Return the result if successful or false otherwise
     *
     * @param Interger $slab Slab ID
     *
     * @return Array|Boolean
     */
    public function getItems($slab)
    {
        if ($this->memcache->getDriver() == 'Memcached') {
            return $this->memcache->driver('Server')->items($slab);
        }
        return $this->memcache->items($slab);
    }
    
    /**
     * Send stats cachedump command to server to retrieve slabs items
     * Return the result if successful or false otherwise
     *
     * @param Interger $slab Slab ID
     * @param Interger $maxnum Max num
     *
     * @return Array|Boolean
     */
    public function getCachedump($slab, $maxnum)
    {
        if ($this->memcache->getDriver() == 'Memcached') {
            return $this->memcache->driver('Server')->cachedump($slab, $maxnum);
        }
        return $this->memcache->cachedump($slab, $maxnum);
    }
    
    /**
     * Send sizes command to server
     * Return the result if successful or false otherwise
     *
     * @return Array|Boolean
     */
    public function getSizes()
    {
        if ($this->memcache->getDriver() == 'Memcached') {
            return $this->memcache->driver('Server')->sizes();
        }
        return $this->memcache->sizes();
    }
    
    /**
     * Retrieve slabs stats
     * Return the result if successful or false otherwise
     *
     * @return Array|Boolean
     */
    public function getSlabs()
    {
        if ($this->memcache->getDriver() == 'Memcached') {
            return $this->memcache->driver('Server')->slabs();
        }
        return $this->memcache->slabs();
    }
    
    /**
     * Send stats settings command to server
     * Return the result if successful or false otherwise
     *
     * @return Array|Boolean
     */
    public function getSettings()
    {
        return $this->memcache->driver('Server')->settings();
    }
    
    /**
     * get monitor data
     *
     * @return array
     */
    public function getSessionMonitor() 
    {
        $list = $_SESSION["MADM_SESSION_KEY"]['monitor'];
        return $list;
    }
    
    /**
	 * Get the specified configuration value.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
    public function get($key, $default = null)
    {
        return $this->memcache->get($key, $default);
    }
    
    /**
     * Set a given configuration value.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function set($key, $value, $duration = 2592000)
    {
        return $this->memcache->set($key, $value, $duration);
    }
    
    /**
     * Increment a given configuration value.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function increment($key, $value)
    {
        return $this->memcache->increment($key, $value);
    }
    
    /**
     * Decrement a given configuration value.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function decrement($key, $value)
    {
        return $this->memcache->decrement($key, $value);
    }
    
    /**
     * Flush all given configuration value.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function flushAll($delay = 2592000)
    {
        return $this->memcache->flush($delay);
    }
    
    /**
     * Delete a given configuration value.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function delete($key)
    {
        return $this->memcache->delete($key);
    }

    /**
     *  Execute a telnet command on a server
     *
     * @param $command
     * @return mixed
     */
    public function telnet($command)
    {
        return $this->memcache->telnet($command);
    }

    /**
     * Search for item
     *
     * @param $search
     * @param bool $level
     * @param bool $more
     * @return mixed
     */
    public function search($search, $level = false, $more = false)
    {
        return $this->memcache->search($search, $level, $more);
    }

    /**
     * @param $driver
     * @return $this
     */
    public function driver($driver)
    {
        $this->memcache->driver($driver);
        return $this;
    }

    /**
     * @param $hostname
     * @param $port
     * @param null $driver
     * @return $this
     */
    public function switchServer($hostname, $port, $driver = null)
    {
        $this->memcache->switchServer($hostname, $port, $driver);
        return $this;
    }
    
    
    public function error()
    {
        return $this->memcache->getDataError();
    }
    
}
