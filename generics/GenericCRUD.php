<?php

class GenericCRUD extends Controller
{
    static $entity = "";

    function get_index($args)
    {
        return $this->CrudGetPaginated($this::$entity, $args);
    }

    function post_index($args, $values)
    {
        return Singleton::Model()->insert($this::$entity, $values);
    }

    function put_index($args, $values)
    {
        return Singleton::Model()->updateById($this::$entity, $args[0], $values);
    }

    function delete_index($args)
    {
        return Singleton::Model()->deleteById($this::$entity, $args[0]);
    }

}

?>
