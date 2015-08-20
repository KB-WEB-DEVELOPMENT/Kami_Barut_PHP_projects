<?php
/**
 * 
 */
class Auth
{
    
    public static function handleLogin()
    {
        @session_start();
        echo "session staarted";
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }
    
}

?>
