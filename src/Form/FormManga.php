<?php

namespace Form;

use Form\Form;
use Mangas\Manga;

use PDO;

class FormManga extends Form {

    // send the manga to the Database 
    public function onSubmit($nommanga,$nomimg,$taille,$type,$description = null,$images) {

    

            if(isset($nommanga) && isset($nomimg) && isset($taille) && isset($type) && isset($description)  && isset($images) ) {
                      $manga = new Manga($nommanga,$nomimg,$taille,$type,$description,$images);
                      $manga->addManga($nommanga,$nomimg,$taille,$type,$description,$images);
            
        }
    }    
}