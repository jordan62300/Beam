<?php

namespace Form;

use Form\Form;
use Mangas\Tome;

use PDO;

class FormTome extends Form {

    // send the manga to the Database 
    public function onSubmit($nomChapitre,$description = null) {

    

            if(isset($nomChapitre)  ) {
                      $tome = new Tome($nomChapitre,$description);
                      $tome->addTome($nomChapitre,$description);
            
        }
    }    
}