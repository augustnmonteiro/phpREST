<?php 

class Singleton {
    public static function Auth(){
      return new Auth();
    }

    public static function Model(){
      return new Model();
    }

    public static function Error(){
        return new Error();
    }

}

?>
