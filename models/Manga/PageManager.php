<?php
namespace MangaManager;

use BDD\Connexion_BDD;
use PDO;

class PageManager extends Connexion_BDD{
    public function __construct(){
      $this->connexion();
    }
    
    public function addPageToDatabase($imgnom,$imgtaille,$imgtype,$imgdescription,$images,$tome_id) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("INSERT INTO pages (imgnom,imgtaille,imgtype,imgdescription,images,tome_id) VALUES (?,?,?,?,?,?)");
        $req->execute([
          $imgnom,
          $imgtaille,
          $imgtype,
          $imgdescription,
          $images,
          $tome_id
        ]);
    }

    public function getPageByTomeIdInBDD($tomeId){
      $pdo = $this->getPDO();
      $req = $pdo->prepare("SELECT * FROM pages WHERE tome_id = :tomeId ");
      $req->bindParam(':tomeId',$tomeId);
      $req->execute();
      $res = $req->fetchAll(PDO::FETCH_OBJ);
      return $res;
    
    }

    
}