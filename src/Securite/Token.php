<?php

namespace Securite;

class Token  {

    static function generateToken() {
        $token = bin2hex(openssl_random_pseudo_bytes(16));

        $_SESSION['token'] = $token;
    }

    static function verifyToken() {
        if(isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']) {
            return true;
        } else {
            return false;
        }
    }

    private function verifyReferer() {
        if($_SERVER['HTTP_REFERER'] == 'http://www.monsite.com/formulaire_suppression.php');
    }



}