<?php

namespace App\Memadmin;

class MemcacheCommand extends MemcacheManager
{
    
    /**
     * Send stats command to server
     * Return the result if successful or false otherwise
     *
     * @return array|Boolean
     */
    public function getStats()
    {
        return $this->memcache->stats();
    }
    
    /**
     * Send stats cachedump command to server to retrieve slabs items
     * Return the result if successful or false otherwise
     *
     * @param int $slab Slab ID
     *
     * @return array|Boolean
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
     * @param int $slab Slab ID
     * @param int $maxnum Max num
     *
     * @return array|Boolean
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
     * @return array|Boolean
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
     * @return array|Boolean
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
     * @return array|Boolean
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
        $result = $this->memcache->get($key, $default);

        return $this->_filiterOutputError($result);
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
        $result = $this->memcache->set($key, $value, $duration);
        return $this->_filiterOutputError($result);
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
        $result = $this->memcache->increment($key, $value);
        return $this->_filiterOutputError($result);
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
        $result = $this->memcache->decrement($key, $value);
        return $this->_filiterOutputError($result);
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
        $result = $this->memcache->flush($delay);
        return $this->_filiterOutputError($result);
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
        $result = $this->memcache->delete($key);
        return $this->_filiterOutputError($result);
    }
    
    public function telnet($command)
    {
        $result = $this->memcache->telnet($command);
        return $this->_filiterOutputError($result);
    }
    
    public function search($search, $level = false, $more = false)
    {
        return $this->memcache->search($search, $level, $more);
    }
    
    public function driver($driver)
    {
        $this->memcache->driver($driver);
        return $this;
    }
    
    public function _filiterOutputError($result)
    {
        if ($result === false || $result === null || $result === true) {
            return $this->memcache->getResultMessage();
        } else {
            return $result;
        }
    }
    
}
