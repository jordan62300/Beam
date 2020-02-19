<?php

namespace Mangas;

use MangaManager\TomeManager;

class Tome extends TomeManager {
    private $nom;
    private $imgnom;
    private $taille;
    private $imgtype;
    private $imgdescription;
    private $images;
 
    public function __construct(String $nom = null ,String $imgnom = null, String $taille = null, $imgtype=null , $imgdescription = null , $images= null){
     $this->nom = $nom;
     $this->imgnom = $imgnom;
     $this->taille = $taille;
     $this->$imgtype = $imgtype;
     $this->$imgdescription = $imgdescription;
     $this->images = $images;
     parent::__construct();
 }

 public function addTome($nom,$imgnom,$taille,$imgtype,$imgdescription,$images){
    $mangaId = $_GET['mangaId'];
    $image =  addslashes($images);
    $target = "images/Tome/".basename($imgnom);
    var_dump($target);
    $this->addTomeToDatabase($nom,$imgnom,$taille,$imgtype,$imgdescription,$images,$mangaId);
    if(move_uploaded_file($images,$target)) {
        echo "yes";
    }
}

function dd(...$vars) {
    foreach($vars as $var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
}
}

public function getTomeByMangaId(){
    $mangaId = $_GET['mangaId'];
    $tomes = $this->getTomeByMangaIdInBDD($mangaId);
    return $tomes;
}

public function getTomeJoinByMangaId(){
    $mangaId = $_GET['mangaId'];
    $tomes = $this->getTomeJoinWithMangaIdInBDD($mangaId);
    return $tomes;
}
}
