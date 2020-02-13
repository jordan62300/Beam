<?php

namespace Mangas;

use MangaManager\TomeManager;

class Tome extends TomeManager {
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

 public function addTome($nom,$taille,$imgtype,$imgdescription,$images){
    $mangaId = $_GET['mangaId'];
    $image =  addslashes($images);
    $target = "images/Tome/".basename($nom);
    var_dump($target);
    $this->addTomeToDatabase($nom,$taille,$imgtype,$imgdescription,$images,$mangaId);
    if(move_uploaded_file($images,$target)) {
        echo "yes";
    }
}

public function getTomeByMangaId(){
    $mangaId = $_GET['mangaId'];
}
}
