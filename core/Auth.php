<?php

class Auth
{

    function isAuthenticated()
    {
        if (isset($_SESSION['user_id'])) {

            return $_SESSION['user_id'];
        } else {

            http_response_code(403);

            exit;
        }
    }

    function authentic($user_id)
    {
        $_SESSION['user_id'] = $user_id;
    }

    function unAuthentic()
    {
        unset($_SESSION['user_id']);
    }
}

?>