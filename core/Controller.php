<?php

class Controller
{

    function CrudGetPaginated($table, $args){
        if (isset($args[0]) && $args[0] != '') {
            return Singleton::MysqlHelper()->getById($table, $args[0]);
        }
        return Singleton::MysqlHelper()->fetch_all_paginated($table, null);
    }

    function CrudGet($table, $args){
        if (isset($args[0]) && $args[0] != '') {
            return Singleton::MysqlHelper()->getById($table, $args[0]);
        }
        return Singleton::MysqlHelper()->fetch_all($table, null);
    }

    function isAuthenticated()
    {
        Singleton::Auth()->isAuthenticated();
    }
}

?>