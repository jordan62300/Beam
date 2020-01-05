<?php

namespace Access;

use UserAppBDD\InscriptionManager;

class Inscription extends InscriptionManager{

    public function addUser($prenom,$nom,$email,$telephone,$user,$password_1,$password_2) {
        if($password_1 === $password_2 ) {
            $password = md5($password_1);
            if(!$this->checkDoubleUsername($user)) {
            $this->addUserToDatabase($prenom,$nom,$email,$telephone,$user,$password);
            } else {
                echo ' erreur ';
            }
        }
    }
    
}