<?php
namespace MangaManager;

use BDD\Connexion_BDD;
use PDO;

class TomeManager extends Connexion_BDD{
    public function __construct(){
      $this->connexion();
    }
    
    public function addTomeToDatabase($imgnom,$imgtaille,$imgtype,$imgdescription,$images,$manga_id) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("INSERT INTO tomes (imgnom,imgtaille,imgtype,imgdescription,images,manga_id) VALUES (?,?,?,?,?,?)");
        $req->execute([
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
      $req = $pdo->query("SELECT * FROM tomes WHERE manga_id = '$mangaId' ");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    
    }

    public function getTomeJoinWithMangaIdInBDD($mangaId){
      $pdo = $this->getPDO();
      $req = $pdo->query("SELECT * FROM tomes INNER JOIN mangas On tomes.manga_id = mangas.id WHERE tomes.manga_id = '$mangaId' ");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;

  }
}