<?php

namespace Form;

use Form\Form;
use Access\Connexion;

use PDO;



class FormLogin extends Form {

    // send the graine to the Database 
    public function onSubmit($utilisateur,$password) {

            if(isset($utilisateur) && isset($password)  ) {
                    $connexion = new Connexion();
                    $connexion->loginUser($utilisateur,$password);
        }
    }    
}