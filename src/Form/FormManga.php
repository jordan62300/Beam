<?php

namespace Form;

use Form\Form;
use Mangas\Manga;

use PDO;

class FormManga extends Form {

    // send the manga to the Database 
    public function onSubmit($nom,$taille,$type,$description = null,$images) {

    

            if(isset($nom) && isset($taille) && isset($type) && isset($description)  && isset($images) ) {
                      $manga = new Manga($nom,$taille,$type,$description,$images);
                      $manga->addManga($nom,$taille,$type,$description,$images);
            
        }
    }    
}