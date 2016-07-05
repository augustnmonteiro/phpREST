<?php

class Model
{

    public $mysql;

    function __construct()
    {
        $this->mysql = new Mysqli('p:' . DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->mysql->connect_errno) {
            Singleton::Message()->error(412, 'Database Connection | ' . $this->mysql->connect_error);
        }
    }

    function getProjection($projection)
    {
        if (!isset($projection) || $projection == '') {
            $projection = '*';
        } else {
            $projection = implode(',', $projection);
        }
        return $projection;
    }

    function fetch_all($table, $projection)
    {
        $projection = $this->getProjection($projection);
        return $this->query("SELECT $projection FROM $table");
    }

    function fetch_all_paginated($table, $projection)
    {
        $projection = $this->getProjection($projection);
        return $this->query_paginated("SELECT $projection FROM $table");
    }

    function getById($table, $id, $projection)
    {
        $projection = $this->getProjection($projection);
        $sql = $this->mysql->query("SELECT $projection FROM $table WHERE id='$id' LIMIT 1");
        if ($sql) {
            $result = $sql->fetch_all(MYSQLI_ASSOC);
            if (count($result) > 0) {
                return $result[0];
            } else {
                return (object) [];
            }
        }
        Singleton::Message()->error(412, 'getById | ' . $this->mysql->error);
        return false;
    }

    function query($query)
    {
        $sql = $this->mysql->query($query);
        if ($sql) {
            return $sql->fetch_all(MYSQLI_ASSOC);
        }
        Singleton::Message()->error(412, 'Query | ' . $this->mysql->error);
        return false;
    }

    function query_paginated($query)
    {
        $sql = $this->mysql->query($query . ' LIMIT ' . Pagination::paginate());
        if ($sql) {
            return $sql->fetch_all(MYSQLI_ASSOC);
        }
        Singleton::Message()->error(412, 'Query Paginated | ' . $this->mysql->error);
    }

    function insert($table, $values)
    {
        $query = 'INSERT INTO ' . $table;
        $query .= ' (' . implode(',', array_keys((array)$values)) . ')';
        $query .= ' VALUES ';
        $query .= "('" . implode("','", array_values((array)$values)) . "')";

        if ($this->mysql->query($query)) {
            Singleton::Message()->success(201, 'Created');
        }
        Singleton::Message()->error(412, 'Insert | ' . $this->mysql->error);
        return false;
    }

    function delete($query)
    {
        if ($this->mysql->query($query)) {
            Singleton::Message()->success(200, 'Deleted');
        }
        Singleton::Message()->error(412, 'Delete | ' . $this->mysql->error);
        return false;
    }

    function deleteById($table, $id)
    {
        $query = "DELETE FROM $table WHERE id='$id'";
        if ($this->mysql->query($query)) {
            Singleton::Message()->success(200, 'Deleted');
        }
        Singleton::Message()->error(412, 'Delete By Id | ' . $this->mysql->error);
        return false;
    }

    function update($query)
    {
        if ($this->mysql->query($query)) {
            Singleton::Message()->success(200, 'Updated');
        }
        Singleton::Message()->error(412, 'Update | ' . $this->mysql->error);
        return false;
    }

    function valuesToUpdate($values)
    {
        $set = [];
        foreach ($values as $key => $value) {
            array_push($set, "$key='$value'");
        }
        return implode(',', $set);
    }

    function updateById($table, $id, $values)
    {
        $query = "UPDATE $table SET ";
        $query .= $this->valuesToUpdate($values);
        $query .= " WHERE id='$id'";
        if ($this->mysql->query($query)) {
            Singleton::Message()->success(200, 'Updated');
        }
        Singleton::Message()->error(412, 'Update | ' . $this->mysql->error);
        return false;
    }
}

?>