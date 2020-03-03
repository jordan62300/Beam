<?php

namespace Mangas;

use MangaManager\TomeManager;

class Tome extends TomeManager {
    private $nom;
    private $description;
 
    public function __construct(String $nom = null , String $description = null){
     $this->nom = $nom;
     $this->description = $description;
     parent::__construct();
 }

 public function addTome($nom,$description){
    $mangaId = $_GET['mangaId'];
    $this->addTomeToDatabase($nom,$description,$mangaId);
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
    $tomes = $this->getTomesJoinWithMangaIdInBDD($mangaId);
    return $tomes;
}
}
