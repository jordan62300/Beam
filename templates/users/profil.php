<?php 

include('utils.php');

use Mangas\Manga;

$manga = new Manga();

$manga->connexion();

?>

<head><link rel="stylesheet" href="templates/styles/arene.css"></head>

<body>
    <h1><?= $manga->displayMangasByUser($_SESSION['id']); ?></h1>
</body>
</html>