<?php

class RedisHelper
{

    public $redis;

    function __construct()
    {
        $this->redis = new Redis();
        $this->redis->pconnect("localhost", 6379);
    }

    function set($key, $value, $expire = null) {
        return $this->redis->set($key, $value, $expire);
    }

    function setExpireAt($key, $timestamp) {
        return $this->redis->expireAt($key, $timestamp);
    }

    function expireNow($key) {
        return $this->redis->expireAt($key, time(null));
    }

    function exists($key) {
        return $this->redis->exists($key);
    }

    function get($key) {
        return $this->redis->get($key);
    }

}

?>