<?php

class Parser
{
    function getValues()
    {
        return json_decode(file_get_contents('php://input'));
    }

}

?>
