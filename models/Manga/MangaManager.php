<?php
namespace MangaManager;

use BDD\Connexion_BDD;
use PDO;

class MangaManager extends Connexion_BDD{
    public function __construct(){
      $this->connexion();
    }
    
    public function getAllMangas() {
      $pdo =  $this->getPDO();
      $req =  $pdo->query("SELECT * FROM mangas");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    }



    public function addMangasToDatabase($nommanga,$imgnom,$imgtaille,$imgtype,$imgdescription,$images,$userid) {
      $pdo = $this->getPDO();
      $req = $pdo->prepare("INSERT INTO mangas (nommanga,imgnom,imgtaille,imgtype,imgdescription,images,user_id) VALUES (?,?,?,?,?,?,?)");
      $req->execute([
        $nommanga,
        $imgnom,
        $imgtaille,
        $imgtype,
        $imgdescription,
        $images,
        $userid
      ]);
    }

    public function deleteMangasToDatabase($id){
      $pdo = $this->getPDO();
      $req = $pdo->prepare("DELETE FROM mangas WHERE id >= :id");
                $req->bindParam(':id', $id, PDO::PARAM_INT);
                $req->execute();
               
    }

    public function getMangaByIdInBDD($id) {
      $pdo = $this->getPDO();
      $req = $pdo->query("SELECT * FROM mangas WHERE id = '$id' ");
      $res = $req->fetch();
      return $res;
    }

    public function getUserIdByMangaIdInBDD($id) {
      $pdo = $this->getPDO();
      $req = $pdo->query("SELECT user_id FROM mangas WHERE id = '$id' ");
      $res = $req->fetch();
      return $res['user_id'];
    }

    public function getMangasByUser($userId) {
      $pdo = $this->getPDO();
      $req = $pdo->query(" SELECT * FROM mangas WHERE mangas.user_id = '$userId'");
      $res = $req->fetchall(PDO::FETCH_OBJ);
      return $res;
    } 

    public function getAllMangasClassedByLikes() {
      $pdo =  $this->getPDO();
      $req =  $pdo->query("SELECT * FROM mangas ORDER BY likes DESC");
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    }
}
