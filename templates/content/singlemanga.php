<?php

include('utils.php');

use Mangas\Manga;

$conn = new Manga();

$conn->connexion();

$manga = $conn->getMangaById($_GET['mangaId']);



?>

<head>
<link rel="stylesheet" href="templates/styles/arene.css">
</head>
<body>
    <h1 class="title"><?= $manga['imgnom']?></h1>
    <div class="container">
        <div class="content-items">
        <?= $conn->displaySingleManga($_GET['mangaId']); ?>
