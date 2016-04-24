<?php

class Singleton
{

    private static $auth, $model, $error;

    public static function Auth()
    {
        if (static::$auth === null) {
            static::$auth = new Auth();
        }

        return static::$auth;
    }

    public static function Model()
    {
        if (static::$model === null) {
            static::$model = new Model();
        }

        return static::$model;
    }

    public static function Error()
    {
        if (static::$error === null) {
            static::$error = new Error();
        }

        return static::$error;
    }
}

?>