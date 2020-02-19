<?php

include('utils.php');

use Mangas\Manga;
use Mangas\Like;
use Mangas\Dislike;
use Mangas\Page;
use Mangas\Tome;

$mangas = new Manga();
$likes = new Like();
$dislike = new Dislike();
$pageInstance = new Page();
$tomeInstance = new Tome();

$userId = $tomeInstance->getTomeJoinByMangaId();    // Recupere le userId
$chapitres = $tomeInstance->getTomeByMangaId();     // Recupere les chapitres par l'id du manga
$pages = $pageInstance->getPageByTomeId();          // Recupere les pas par l'id du chapitre

$number = 0;

if(isset($_POST['tomeSelectedId'])) {               // Recupere un Post ajax pour le changement d'id du champ select
    $id = $_POST['tomeSelectedId'];                 
}

if(isset($_POST['incresedNumber'])) {               // Recupere un Post ajax pour le changement de l'index de page
    $number =   $_POST['incresedNumber'];
} else if(isset($_POST['decreasedNumber'])) {
    $number =   $_POST['decreasedNumber'];
}

$mangas->connexion();

$manga = $mangas->getMangaById();       //  Recupere le manga en fonction de son id 

if(isset($_GET['action']) && $_GET['action'] == 'like') {           // Recupere les likes et dislikes et verifie si deja vote
    $likes->checkHasLikedOnce($_GET['mangaId'] , $_SESSION['id']);
} else if(isset($_GET['action']) && $_GET['action'] == 'dislike') {
    $dislike->checkHasDislikedOnce($_GET['mangaId'] , $_SESSION['id']);
}

?>

<head>
<link rel="stylesheet" href="templates/styles/arene.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" defer></script>
<script src="../public/js/turnImage.js" defer></script>
</head>
<body>
    <h1 class="title"><?= $manga['imgnom']?></h1>
    <div class="container">
    <label for="pet-select">Chapitre :</label>

<select name="chapitre" id="chapitre-select">

    <?php foreach($chapitres as $chapitre): ?>
        <option id=<?=$chapitre->id?> value=<?=$chapitre->id?>> <?= 'chapitre ' .$chapitre->id .' : '. $chapitre->nom?> </option>
    <?php endforeach; ?>
</select>
        <div class="content-items">
        <div class='items'>
        <?php if(!isset($_GET['tomeId'])): ?>
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>"> <img class='img' src="images/<?=$manga['imgnom']?> "/> </a>
        <?php else: ?>
        <img class='img' src=images/Page/<?=$pages[$number]->imgnom?>/>
        
        <?php endif;?>
        
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>&action=like"> Likes </a>
   <a href="index.php?content=manga&mangaId=<?=$manga['id']?>&action=dislike"> Disikes </a>
   <?php if(isset($_SESSION['id']) && $manga['user_id'] == $_SESSION['id']) {
       echo "  <a href='index.php?action=addTome&mangaId=".$manga['id']."'> Ajouter un Tome
";
   } else {
      
   } ?>
   <a href="index.php?content=tome&mangaId=<?=$manga['id']?>">Acceder aux tomes</a>
   <button  class="btn-remove">Precedent</button>
   <button  class="btn-add">Suivant</button>
    
  </div>

