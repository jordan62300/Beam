<?php

namespace Mangas;

use MangaManager\PageManager;

class Page extends PageManager {
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

 public function addPage($nom,$taille,$imgtype,$imgdescription,$images){
    $tomeId = $_GET['tomeId'];
    $image =  addslashes($images);
    $target = "images/Page/".basename($nom);
    var_dump($target);
    $this->addPageToDatabase($nom,$taille,$imgtype,$imgdescription,$images,$tomeId);
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

public function getPageByTomeId(){
    $tomeId = $_GET['tomeId'];
    $pages = $this->getPageByTomeIdInBDD($tomeId);
    return $pages;
}
}
