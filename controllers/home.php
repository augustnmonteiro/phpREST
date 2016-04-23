<?php

class home extends Controller
{

    function get_index()
    {
        return Singleton::Model()->query("SELECT * FROM users");
    }

    function post_index()
    {
        echo "POST";
    }

    function delete_index()
    {
        echo "DELETE";
    }

}

?>
