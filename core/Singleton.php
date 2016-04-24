<?php

class Singleton
{

    private $auth, $model, $error;

    public static function Auth()
    {
        if (empty($auth)) {
            $auth = new Auth();
        }

        return $auth;
    }

    public static function Model()
    {
        if (empty($model)) {
            $model = new Model();
        }

        return $model;
    }

    public static function Error()
    {
        if (empty($error)) {
            $error = new Error();
        }

        return $error;
    }
}

?>