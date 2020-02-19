<?php

namespace Form;

use Form\Form;
use Mangas\Tome;

use PDO;

class FormTome extends Form {

    // send the manga to the Database 
    public function onSubmit($nom,$imgnom,$taille,$type,$description = null,$images) {

    

            if(isset($nom) && isset($imgnom) && isset($taille) && isset($type) && isset($description)  && isset($images) ) {
                      $manga = new Tome($nom,$imgnom,$taille,$type,$description,$images);
                      $manga->addTome($nom,$imgnom,$taille,$type,$description,$images);
            
        }
    }    
}