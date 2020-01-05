<?php

include('utils.php');

use Mangas\Manga;

$conn = new Manga();

$conn->connexion();

    if(isset($_GET['delete'])){
        $conn->onDelete($_GET['delete']);
        echo "done";
    }

    if(isset($_SESSION['id'])){
    var_dump($_SESSION['id']); 
    }

?>


<head>
<link rel="stylesheet" href="templates/styles/arene.css">
</head>
<body>
    <h1 class="title">Arene</h1>
    <div class="container">
        <div class="content-items">
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
               <a href="inscription.php"> <img src="https://via.placeholder.com/150x300" alt="manga"> </a>
            </div>
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
                <img src="https://via.placeholder.com/150x300" alt="manga">
            </div>
            <div class="items">
                <img class="img" src="https://via.placeholder.com/150x800" alt="manga">
            </div>
             <div class="items">
                <img class="img" src="https://via.placeholder.com/150x800" alt="manga">
            </div>
            <?= $conn->displayMangas() ?>
        </div>
    </div>
</body>
</html>