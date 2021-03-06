<?php

namespace Mangas;

use MangaManager\MangaManager;


class Manga extends MangaManager {
   private $nommanga;
   private $nom;
   private $taille;
   private $imgtype;
   private $imgdescription;
   private $images;

   public function __construct(String $nommanga = null ,String $nom = null, String $taille = null, $imgtype=null , $imgdescription = null , $images= null){
    $this->$nommanga = $nommanga;
    $this->nom = $nom;
    $this->taille = $taille;
    $this->$imgtype = $imgtype;
    $this->$imgdescription = $imgdescription;
    $this->images = $images;
    parent::__construct();
}

public function addManga($nommanga,$nom,$taille,$imgtype,$imgdescription,$images){
    $userid = $_SESSION['id'];
    $image =  addslashes($images);
    $target = "images/".basename($nom);
    var_dump($target);
    $this->addMangasToDatabase($nommanga,$nom,$taille,$imgtype,$imgdescription,$images,$userid);
    if(move_uploaded_file($images,$target)) {
        echo "yes";
    }
}

public function getMangaByLike(){
    $mangas =  $this->getAllMangasClassedByLikes();
    return $mangas;
  }


public function displaySingleManga($id){
  $manga = $this->getMangaById($id);
  echo "
  <div class='items'>
   <a href='index.php?content=manga&mangaId=".$manga['id']."'> <img class='img' src='images/".$manga['imgnom']."' /> </a>
   <a href='index.php?content=manga&mangaId=".$manga['id']."&action=like'> Likes </a>
   <a href='index.php?content=manga&mangaId=".$manga['id']."&action=dislike'> Disikes </a>
  </div>
 " ;

}



public function displayMangasByUser($userId){
    $mangas = $this->getMangasByUser($_SESSION['id']);
    foreach($mangas as $manga){
        echo "
        <div class='items'>
         <a href='index.php?content=manga&mangaId=".$manga->id."&author=tokenInfo'> <img class='img' src='images/".$manga->imgnom."' /> </a>
        </div>
       " ;
}
}

public function addUrlParam($params=array()){
	$p = array_merge($_GET, $params);
	$qs = http_build_query($p);
	return basename($_SERVER['PHP_SELF']).'?'.$qs;
}

public function getMangaById(){
  if(isset($_GET['mangaId'])) {
  $id = htmlspecialchars($_GET['mangaId'], ENT_QUOTES);
  $mangas =  $this->getMangaByIdInBDD($id);
  return $mangas;
  }
}

public function getUserIdByMangaId() {
  if(isset($_GET['mangaId'])) {
  $id = htmlspecialchars($_GET['mangaId'], ENT_QUOTES);
  $userId = $this->getUserIdByMangaIdInBDD($id);
  return $userId;
  }
}


}

