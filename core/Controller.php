<?php

class Controller
{

    function CrudGetPaginated($table, $args){
        if (isset($args[0]) && $args[0] != '') {
            return Singleton::Model()->getById($table, $args[0]);
        }
        return Singleton::Model()->fetch_all_paginated($table);
    }

    function CrudGet($table, $args){
        if (isset($args[0]) && $args[0] != '') {
            return Singleton::Model()->getById($table, $args[0]);
        }
        return Singleton::Model()->fetch_all($table);
    }

    function isAuthenticated()
    {
        Singleton::Auth()->isAuthenticated();
    }
}

?>