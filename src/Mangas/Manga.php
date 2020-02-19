<?php

namespace Mangas;

use MangaManager\MangaManager;

class Manga extends MangaManager {
   private $nom;
   private $taille;
   private $imgtype;
   private $imgdescription;
   private $images;

   public function __construct(String $nom = null, String $taille = null, $imgtype=null , $imgdescription = null , $images= null){
    $this->nom = $nom;
    $this->taille = $taille;
    $this->$imgtype = $imgtype;
    $this->$imgdescription = $imgdescription;
    $this->images = $images;
    parent::__construct();
}

public function addManga($nom,$taille,$imgtype,$imgdescription,$images){
    $userid = $_SESSION['id'];
    $image =  addslashes($images);
    $target = "images/".basename($nom);
    var_dump($target);
    $this->addMangasToDatabase($nom,$taille,$imgtype,$imgdescription,$images,$userid);
    if(move_uploaded_file($images,$target)) {
        echo "yes";
    }
}

public function displayMangas(){
    $mangas =  $this->getAllMangasClassedByLikes();
      foreach($mangas as $manga){
          echo "
          <div class='items'>
           <a href='index.php?content=manga&mangaId=".$manga->id."'> <img class='img' src='images/".$manga->imgnom."' /> </a>
          </div>
         " ;
      }
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
  $id = $_GET['mangaId'];
  $mangas =  $this->getMangaByIdInBDD($id);
  return $mangas;
}


}

