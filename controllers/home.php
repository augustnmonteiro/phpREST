<?php

class home extends Controller
{

    function get_index()
    {
        return (object) [
            "message" => "Welcome :D",
            "description" => "Simple and Fast rest framework"
        ];
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