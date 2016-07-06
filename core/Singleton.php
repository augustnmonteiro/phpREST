<?php

class Singleton
{

    private static $auth, $mysqlHelper, $message, $parser;

    public static function Auth()
    {
        if (static::$auth === null) {
            static::$auth = new Auth();
        }

        return static::$auth;
    }

    public static function MysqlHelper()
    {
        if (static::$mysqlHelper === null) {
            static::$mysqlHelper = new MysqlHelper();
        }

        return static::$mysqlHelper;
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