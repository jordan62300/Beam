<?php
namespace Vote;

use MangaManager\MangaManager;
use PDO;

class LikeManager extends MangaManager {
    public function __construct(){
        $this->connexion();
    }

    public function addLikeToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 1 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }

    public function addTwoLikesToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 1 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }

    public function createNewVote($mangaId,$userId) {
       
        $pdo = $this->getPDO();
        $req = $pdo->prepare("INSERT INTO votes_mangas_users (user_id,manga_id,voted) VALUES (?,?,?)");
        $req->execute([
          $userId,
          $mangaId,
          3
        ]);
}

    public function removeLikeToDatabase($numberOfLikes,$mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("UPDATE mangas,votes_mangas_users SET mangas.likes = :likes, votes_mangas_users.voted = 3 WHERE mangas.id = :mangaId AND votes_mangas_users.manga_id = :mangaId AND votes_mangas_users.user_id = :userId  ");
        $req->execute(array(
            'likes' => $numberOfLikes,
            'mangaId' => $mangaId,
            'userId' => $userId
            ));
        
    }

    public function getLikesByManga($mangaId){
        $pdo = $this->getPDO();
        $req = $pdo->prepare("SELECT likes FROM mangas WHERE id =:mangaId");
        $req->bindParam(':mangaId',$userId,PDO::PARAM_INT);
        $res->execute();
        $res = $req->fetch();
        return $res['likes'];
    }

    public function hasVoted($mangaId,$userId) {
        $pdo = $this->getPDO();
        $req = $pdo->prepare("SELECT voted FROM votes_mangas_users WHERE manga_id =:mangaId AND user_id = :userId ");
        $req->bindParam(':mangaId',$mangaId,PDO::PARAM_INT);
        $req->bindParam(':userId',$userId,PDO::PARAM_INT);
        $res->execute();
        $res = $req->fetch();
        return $res['voted'];
    }

    

}

