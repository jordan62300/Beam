<?php
namespace UserAppBDD;

use BDD\Connexion_BDD;
use PDO;

class ConnexionManager extends Connexion_BDD{

    public function __construct(){
        $this->connexion();
      }


        // Login to the app
    public function loginToApp($utilisateur,$password){
      $pdo =  $this->getPDO();
      $req =  $pdo->query("SELECT * FROM users WHERE utilisateur = '$utilisateur' AND password='$password'");
      $res = $req->fetch();
      session_start();
      $_SESSION['id'] = $res['id'];
      return $res;
    }
}
