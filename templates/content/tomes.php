<?php
include('utils.php');

use Mangas\Tome;

$tomeInstance = new Tome();

$userId = $tomeInstance->getTomeJoinByMangaId();
$tomes = $tomeInstance->getTomeByMangaId();

$tomeInstance->dd($userId);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="templates/styles/arene.css">
    <title>Document</title>
</head>
<body>
    <h1>tome</h1>

    <?php foreach($tomes as $key=>$tome): ?>
        <div class='items'>
        <a href="index.php?content=page&mangaId=<?=$_GET['mangaId']?>&tomeId=<?=$tome->id?>"><img class='img' src='images/<?=$tome->imgnom?>' /></a>
        </div>
    <?php endforeach; ?>
     ?>
</body>
</html>