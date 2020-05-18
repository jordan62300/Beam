<?php
namespace MangaManager;

use BDD\Connexion_BDD;
use PDO;

class TomeManager extends Connexion_BDD{
    public function __construct(){
      $this->connexion();
    }
    
    public function addTomeToDatabase($nom,$description,$manga_id) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("INSERT INTO chapitres (nom,description,manga_id) VALUES (?,?,?)");
        $req->execute([
          $nom,
          $description,
          $manga_id,
        ]);
    }

    public function getTomeByMangaIdInBDD($mangaId){
      $pdo = $this->getPDO();
      $req = $pdo->prepare("SELECT * FROM chapitres WHERE manga_id = :mangaId ");
      $req->bindParam(':mangaId',$mangaId,PDO::PARAM_INT);
      $req->execute();
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    
    }

    public function getTomesJoinWithMangaIdInBDD($mangaId){
      $pdo = $this->getPDO();
      $req = $pdo->prepare("SELECT * FROM chapitres INNER JOIN mangas On chapitres.manga_id = mangas.id WHERE chapitres.manga_id = :mangaId ");
      $req->bindParam(':mangaId',$mangaId,PDO::PARAM_INT);
      $req->execute();
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;

  }
  
}