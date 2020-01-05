<?php

namespace Mangas;

use BDD\MangaManager;

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
    $mangas =  $this->getAllMangas();
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
  </div>
 " ;
}



public function displayMangasByUser($userId){
    $mangas = $this->getMangasByUser($_SESSION['id']);
    foreach($mangas as $manga){
        echo "
        <div class='items'>
         <a href='index.php?content=manga&mangaId=".$manga->id."'> <img class='img' src='images/".$manga->imgnom."' /> </a>
        </div>
       " ;
}
}


}

