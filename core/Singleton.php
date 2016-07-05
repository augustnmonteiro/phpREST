<?php

class Singleton
{

    private static $auth, $model, $message, $parser;

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

    public static function Message()
    {
        if (static::$message === null) {
            static::$message = new Message();
        }

        return static::$message;
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