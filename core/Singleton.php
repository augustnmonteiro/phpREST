<?php

class Singleton
{

    private static $auth, $model, $error, $parser;

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

    public static function Parser()
    {
        if (static::$parser === null) {
            static::$parser = new Parser();
        }

        return static::$parser;
    }
}

?>