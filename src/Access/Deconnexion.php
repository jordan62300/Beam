<?php

namespace Access;



class Deconnexion {

    public function deconnexionUser() {
        if (isset($_SESSION['id'])) {
            session_unset(); 
            session_destroy(); 
            header('location:index.php?content=arene');
        } else {
            header('location:index.php?content=arene');
        }
    }

}