<?php

namespace Form;

use Form\Form;
use Access\Inscription;

use PDO;



class FormInscription extends Form {

    // send the graine to the Database 
    public function onSubmit($prenom,$nom,$email,$telephone,$user,$password_1,$password_2) {

            if(isset($prenom) && isset($nom) && isset($email) && isset($telephone)  && isset($user) && isset($password_1) && isset($password_2)  ) {
                    $inscription = new Inscription();
                    $inscription->addUser($prenom,$nom,$email,$telephone,$user,$password_1,$password_2);
            
        }
    }    
}