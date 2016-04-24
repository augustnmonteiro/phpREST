<?php

class Model
{

    public $mysql;

    function __construct()
    {
        $this->mysql = new Mysqli('p:' . DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysql->connect_errno) {
            Singleton::Error()->show(412, 'Database Connection | ' . $this->mysql->connect_error);
        }
    }

    function fetch_all($query)
    {
        $sql = $this->mysql->query($query);
        if ($sql) {
            return $sql->fetch_all(MYSQL_ASSOC);
        }
        Singleton::Error()->show(412, 'Fetch All | ' . $this->mysql->error);
        return false;
    }

    function fetch_all_paginated($query)
    {
        $sql = $this->mysql->query($query . ' LIMIT ' . Pagination::paginate());
        if ($sql) {
            return $sql->fetch_all(MYSQL_ASSOC);
        }
        Singleton::Error()->show(412, 'Fetch All | ' . $this->mysql->error);
        return false;
    }

    function query($query)
    {
        $sql = $this->mysql->query($query);
        if ($sql) {
            return $sql->fetch_all(MYSQL_ASSOC);
        }
        Singleton::Error()->show(412, 'Query | ' . $this->mysql->error);
        return false;
    }

    function query_paginated($query)
    {
        $sql = $this->mysql->query($query . ' LIMIT ' . Pagination::paginate());
        if ($sql) {
            return $sql->fetch_all(MYSQL_ASSOC);
        }
        Singleton::Error()->show(412, 'Query Paginated | ' . $this->mysql->error);
    }

    function insert($query)
    {
        if ($this->mysql->query($query)) {
            return true;
        }
        Singleton::Error()->show(412, 'Insert | ' . $this->mysql->error);
        return false;
    }

    function delete($query)
    {
        if ($this->mysql->query($query)) {
            return true;
        }
        Singleton::Error()->show(412, 'Delete | ' . $this->mysql->error);
        return false;
    }

    function update($query)
    {
        if ($this->mysql->query($query)) {
            return true;
        }
        Singleton::Error()->show(412, 'Update | ' . $this->mysql->error);
        return false;
    }
}

?>