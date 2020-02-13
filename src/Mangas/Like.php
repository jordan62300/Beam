<?php

namespace Mangas;

use Vote\LikeManager;

class Like extends LikeManager {

    // LIKE PART

    public function modifyLike($mangaId,$userId){
        if(isset($mangaId) && isset($userId) != NULL) {
        $voted =  $this->hasVoted($mangaId,$userId); // verifie si l'utilisateur a déja liké
       
            if($voted == '3'){
                var_dump('liked: '.  $voted);
                $this->addOneLike($mangaId,$userId);
            
      } else if($voted == '1'){
                 $this->removeOneLike($mangaId,$userId);
      } else if($voted == '0' ) {
                $this->addTwoLike($mangaId,$userId);
      }
    } else {
        
        header("location:index.php?content=connexion");
    }
}

    public function checkHasLikedOnce($mangaId,$userId) {
      $voted = $this->hasVoted($mangaId,$userId);
        var_dump('voted : '. $voted);
        if($voted == '0' || $voted == '3') {
            $this->modifyLike($mangaId,$userId);
        }else if($voted ==' 1') {
            $this->modifyLike($mangaId,$userId);
        }else if ($voted == '') {
            $this->createNewVote($mangaId,$userId);
            $this->modifylike($mangaId,$userId);
        }
    }

    public function addOneLike($mangaId,$userId) {
        $numberOfLikes = $this->getLikesByManga($mangaId);    // Si pas de like on compte le nombre de like et on ajoute 1
        $numberOfLikes = $numberOfLikes + 1;
        $this->addLikeToDatabase($numberOfLikes,$mangaId,$userId);         // on envoit la nouvelle valeur dans la DDB
    }

    public function addTwoLike($mangaId,$userId) {
        $numberOfLikes = $this->getLikesByManga($mangaId);    // Si pas de like on compte le nombre de like et on ajoute 1
        $numberOfLikes = $numberOfLikes + 2;
        $this->addTwoLikesToDatabase($numberOfLikes,$mangaId,$userId);         // on envoit la nouvelle valeur dans la DDB
    }

   public function removeOneLike($mangaId,$userId){
        $numberOfLikes = $this->getLikesByManga($mangaId);
        $numberOfLikes = $numberOfLikes - 1 ;
        $this->removeLikeToDatabase($numberOfLikes,$mangaId,$userId);
   }

   // DISLIKE PART 

  




    
}
