<?php

class Message
{

    public static $SUCCESS = "SUCCESS";
    public static $ERROR = "ERROR";

    private function show($status, $code, $msg) {

        http_response_code($code);

        echo json_encode((object)[
            'status' => $status,
            'msg' => $msg
        ]);

        exit();
    }

    function error($code, $msg)
    {
        $this->show($this::$ERROR, $code, $msg);
    }

    function success($code, $msg)
    {
        $this->show($this::$SUCCESS, $code, $msg);
    }
}

?>