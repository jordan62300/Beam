<?php

namespace Form;

use Form\Form;
use Mangas\Page;

use PDO;

class FormPage extends Form {

    // send the manga to the Database 
    public function onSubmit($nom,$taille,$type,$description = null,$images) {

    

            if(isset($nom) && isset($taille) && isset($type) && isset($description)  && isset($images) ) {
                      $page = new Page($nom,$taille,$type,$description,$images);
                      $page->addPage($nom,$taille,$type,$description,$images);
            
        }
    }    
}