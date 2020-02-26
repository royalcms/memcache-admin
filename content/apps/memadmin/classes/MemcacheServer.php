<?php

namespace App\Memadmin;

use Royalcms\Component\Foundation\RoyalcmsObject;
use RC_Session;
use RC_Uri;

class MemcacheServer extends RoyalcmsObject
{
    
    protected static $clusters = [];
    
    const DEFAULT_CLUSTER = 'Default';
    
    const STORAGE_KEY = 'memcache_servers';
    
    
    public function __construct()
    {
        $data = $this->getClustersData();

        if (empty(self::$clusters)) {
            self::$clusters = $data;
        }

        if (! array_get(self::$clusters, self::DEFAULT_CLUSTER)) {
            return rc_redirect(RC_Uri::url('memadmin/index/init'));
        }

    }


    /**
     * 添加集群
     * @param string $name
     * @return \Ecjia\App\Memadmin\MemcacheServer
     */
    public function addCluster($name)
    {
        if (! array_get(self::$clusters, $name)) {
            self::$clusters[$name] = [];
        }

        $this->saveClustersData();

        return $this;
    }

    /**
     * 移除集群
     * @param string $name
     * @return \Ecjia\App\Memadmin\MemcacheServer
     */
    public function removeCluster($name)
    {
        if (! array_get(self::$clusters, $name)) {
            unset(self::$clusters[$name]);
        }

        $this->saveClustersData();

        return $this;
    }

    /**
     * 添加服务器
     * @param string $host
     * @param string $port
     * @param string $cluster
     * @return \Ecjia\App\Memadmin\MemcacheServer
     */
    public function addServer($host, $port, $cluster)
    {
        $key = $host.':'.$port;
        self::$clusters[$cluster][$key] = [
            'hostname' => $host,
            'port' => $port,
        ];

        $this->saveClustersData();

        return $this;
    }

    /**
     * 移除服务器
     * @param string $host
     * @param string $port
     * @param string $cluster
     * @return \Ecjia\App\Memadmin\MemcacheServer
     */
    public function removeServer($host, $port, $cluster)
    {
        $key = $host.':'.$port;
        unset(self::$clusters[$cluster][$key]);

        $this->saveClustersData();

        return $this;
    }

    /**
     * 同时保存多服务器进集群
     * @param string $cluster
     */
    public function saveMultiServer($servers, $cluster)
    {
        self::$clusters[$cluster] = $servers;

        $this->saveClustersData();

        return $this;
    }

    /**
     * 获取所有集群
     */
    public function getAllClusters()
    {
        return array_keys(self::$clusters);
    }

    /**
     * 获取所有服务器，指定集群后，获取指定集群下的所有服务器
     * @param string $cluster
     */
    public function getAllServers($cluster = null)
    {
        if (is_null($cluster)) {
            return self::$clusters;
        } else {
            return array_get(self::$clusters, $cluster, []);
        }
    }


    public function saveClustersData()
    {
        RC_Session::put(self::STORAGE_KEY, serialize(self::$clusters));

        return $this;
    }


    public function getClustersData()
    {
        $data = RC_Session::get(self::STORAGE_KEY, null);
//        dd(unserialize($data[0]));
        if (unserialize($data)) {
            return unserialize($data);
        }else{
            return  unserialize($data[0]);

        }
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
        if (strtolower($cluster) == 'default') {
            $servers = \RC_Config::get('memcache::config.servers');
            if (!empty($servers)) {
                return $servers;
            }
        }

        return array();
    }

    /**
     * Check and return server data
     * Return the value, or false if does not exists
     *
     * @param String $server Server to retreive
     *
     * @return Array
     */
    public function server($server)
    {
        $servers = \RC_Config::get('memcache::config.servers');

        return array_get($servers, $server, array());
    }


    public function clusterSend($request_server, callable $callable = null)
    {
        /* Ask for get on a cluster */
        if (!empty($request_server) && ($cluster = $this->cluster($request_server))) {
            foreach ($cluster as $server) {
                /* Dumping server command response */
                $callable($server);

            }
        }
        /* Ask for get on one server */
        else if (!empty($request_server) && ($server = $this->server($request_server))) {
            /* Dumping server command response */
            $callable($server);

        }
        /* Ask for get on all servers */
        else {
            $servers = ['Default' => \RC_Config::get('memcache::config.servers')];

            foreach ($servers as $cluster => $servers) {
                /* Asking for each server stats */
                foreach ($servers as $server) {
                    /* Dumping server command response */
                    $callable($server);

                }
            }
        }
    }
    
    
}

// end