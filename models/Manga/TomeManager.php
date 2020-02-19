<?php
namespace MangaManager;

use BDD\Connexion_BDD;
use PDO;

class TomeManager extends Connexion_BDD{
    public function __construct(){
      $this->connexion();
    }
    
    public function addTomeToDatabase($nom,$imgnom,$imgtaille,$imgtype,$imgdescription,$images,$manga_id) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("INSERT INTO chapitres (nom,imgnom,imgtaille,imgtype,imgdescription,images,manga_id) VALUES (?,?,?,?,?,?,?)");
        $req->execute([
          $nom,
          $imgnom,
          $imgtaille,
          $imgtype,
          $imgdescription,
          $images,
          $manga_id
        ]);
    }

    public function getTomeByMangaIdInBDD($mangaId){
      $pdo = $this->getPDO();
      $req = $pdo->query("SELECT * FROM chapitres WHERE manga_id = '$mangaId' ");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    
    }

    public function getTomeJoinWithMangaIdInBDD($mangaId){
      $pdo = $this->getPDO();
      $req = $pdo->query("SELECT * FROM chapitres INNER JOIN mangas On chapitres.manga_id = mangas.id WHERE chapitres.manga_id = '$mangaId' ");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;

  }

  function dd(...$vars) {
    foreach($vars as $var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
}
}
}