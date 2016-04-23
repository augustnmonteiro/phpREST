<?php

class Controller {

    function isAuthenticated(){
        Singleton::Auth()->isAuthenticated();
    }

}
