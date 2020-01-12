<?php
namespace BDD;

use BDD\MangaManager;
use PDO;

class DislikeManager extends MangaManager {
    public function __construct(){
        $this->connexion();
    }

    public function hasVoted($mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->query("SELECT voted FROM votes_mangas_users WHERE manga_id ='$mangaId' AND user_id = '$userId' ");
        $res = $req->fetch();
        return $res['voted'];
    }

    

    public function createNewVote($mangaId,$userId) {
       
            $pdo = $this->getPDO();
            $req = $pdo->prepare("INSERT INTO votes_mangas_users (user_id,manga_id,voted) VALUES (?,?,?)");
            $req->execute([
              $userId,
              $mangaId,
              null
            ]);
    }

    public function getLikesByManga($mangaId){
        $pdo = $this->getPDO();
        $req = $pdo->query("SELECT likes FROM mangas WHERE id ='$mangaId'");
        $res = $req->fetch();
        return $res['likes'];
    }

    

    public function addDislikeToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 0 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }

    public function addTwoDislikesToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 0 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }

    public function removeDislikeToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 3 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }
    

}

