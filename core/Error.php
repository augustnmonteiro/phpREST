<?php

class Error
{

    function show($code, $msg)
    {
        http_response_code($code);

        echo json_encode((object)[
            'error' => true,
            'msg' => $msg
        ]);

        exit();
    }
}

?>