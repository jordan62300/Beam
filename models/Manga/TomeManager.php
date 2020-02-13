<?php
namespace MangaManager;

use MangaManager\MangaManager;
use PDO;

class TomeManager extends MangaManager{
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
}