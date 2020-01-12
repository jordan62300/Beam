<?php

include('utils.php');

use Mangas\Manga;
use Mangas\Like;
use Mangas\Dislike;

$mangas = new Manga();
$likes = new Like();
$dislike = new Dislike();

$mangas->connexion();

if(isset($_SESSION['id'])){
    var_dump($_SESSION['id']); 
    }

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
        <?= $mangas->displaySingleManga($_GET['mangaId']); ?>
