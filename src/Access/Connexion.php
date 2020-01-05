<?php

namespace Access;

use UserAppBDD\ConnexionManager;

class Connexion extends ConnexionManager{


    // Try to log the user with value passed from the form
    public function loginUser($user,$password) {
       
            $password = md5($password);
            $loginInfo =   $this->loginToApp($user,$password);
            if($_SESSION['id'] == NULL) {
                echo 'login null';
               var_dump($_SESSION['id']);
            }
            else {
                header("Location: index.php?content=arene");
                var_dump($_SESSION['id']);
            }
        
    }

}