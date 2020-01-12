<?php

namespace Mangas;

use BDD\DislikeManager;

class Dislike extends DislikeManager {

    public function modifyDislike($mangaId,$userId){
        if(isset($mangaId) && isset($userId) != NULL) {
        $voted =  $this->hasVoted($mangaId,$userId); // verifie si l'utilisateur a déja liké
       
            if( $voted == '3'){
                var_dump('vote: '.  $voted);
                $this->addOneDislike($mangaId,$userId);
            
            } else if($voted == '0'){
                    $this->removeOneDislike($mangaId,$userId);
            } else if($voted == '1') {
                $this->addTwoDislike($mangaId,$userId);
            }
        } else {
            
            header("location:index.php?content=connexion");
        }
    }

    
    
    public function checkHasDislikedOnce($mangaId,$userId) {           // Creer un nouvelle ligne si besoin ou renvoit vers dislike
        $voted = $this->hasVoted($mangaId,$userId);
        
          if($voted == '0') {                               // Si disliké
              $this->modifyDislike($mangaId,$userId);
          }else if($voted =='1' || $voted == '3') {                         // Si il a liké
              $this->modifyDislike($mangaId,$userId);
          }else if($voted == '') {
              $this->createNewVote($mangaId,$userId);
              $this->modifyDislike($mangaId,$userId);
          }
      }
    
      public function addOneDislike($mangaId,$userId) {
        $numberOfLikes = $this->getLikesByManga($mangaId);    // Si pas de like on compte le nombre de like et on ajoute 1
        $numberOfLikes = $numberOfLikes - 1;
        $this->addDislikeToDatabase($numberOfLikes,$mangaId,$userId);         // on envoit la nouvelle valeur dans la DDB
    }
    
    public function removeOneDislike($mangaId,$userId){
        $numberOfLikes = $this->getLikesByManga($mangaId);
        $numberOfLikes = $numberOfLikes + 1 ;
        $this->removeDislikeToDatabase($numberOfLikes,$mangaId,$userId);
    }

    public function addTwoDislike($mangaId,$userId) {
        $numberOfLikes = $this->getLikesByManga($mangaId);    // Si pas de like on compte le nombre de like et on ajoute 1
        $numberOfLikes = $numberOfLikes - 2;
        $this->addTwoDislikesToDatabase($numberOfLikes,$mangaId,$userId);  
    }
    
}