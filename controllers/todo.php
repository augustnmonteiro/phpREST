<?php

class todo extends Controller
{

    function get_index($args)
    {
        return $this->CrudGetPaginated('todo', $args);
    }

    function post_index($args, $values)
    {
        return Singleton::Model()->insert('todo', $values);
    }

    function put_index($args, $values)
    {
        return Singleton::Model()->updateById('todo', $args[0], $values);
    }

    function delete_index($args)
    {
        return Singleton::Model()->deleteById('todo', $args[0]);
    }

}

?>