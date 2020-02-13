<?php

include('utils.php');

use Mangas\Manga;
use Mangas\Like;
use Mangas\Dislike;

$mangas = new Manga();
$likes = new Like();
$dislike = new Dislike();

$mangas->connexion();


$manga = $mangas->getMangaById($_GET['mangaId']);

if(isset($_GET['action']) && $_GET['action'] == 'like') {
    $likes->checkHasLikedOnce($_GET['mangaId'] , $_SESSION['id']);
} else if(isset($_GET['action']) && $_GET['action'] == 'dislike') {
    $dislike->checkHasDislikedOnce($_GET['mangaId'] , $_SESSION['id']);
}


?>

<head>
<link rel="stylesheet" href="templates/styles/arene.css">
</head>
<body>
    <h1 class="title"><?= $manga['imgnom']?></h1>
    <div class="container">
        <div class="content-items">
        <div class='items'>
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>"> <img class='img' src="images/<?=$manga['imgnom']?> "/> </a>
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>&action=like"> Likes </a>
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>&action=dislike"> Disikes </a>
   <?php if(isset($_SESSION['id']) && $manga['user_id'] == $_SESSION['id']) {
       echo "  <a href='index.php?action=addTome&mangaId=".$manga['id']."'> Ajouter un Tome
";
   } else {
      
   } ?>
   <a href="index.php?content=tome&mangaId=<?=$manga['id']?>">Acceder aux tomes</a>
  </div>

