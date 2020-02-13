<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="templates/style.css">
</head>

<?php

session_start();


// CONNECTE

if( isset($_GET['action'])  && $_GET['action'] == 'addManga' && isset($_SESSION['id']) && $_SESSION['id'] != null ) {
    require './templates/header/headerconnecter.php';
    require './templates/form/formulairemanga.php';
}  else if(isset($_GET['action']) && $_GET['action'] == 'addTome' && isset($_SESSION['id']) && $_SESSION['id'] != null){
    require './templates/header/headerconnecter.php';
    require './templates/form/formulairetome.php';
} else if(isset($_GET['content']) && $_GET['content'] == "manga" && isset($_SESSION['id']) && $_SESSION['id'] != null ) {
    require './templates/header/headerconnecter.php';
    require './templates/content/singlemanga.php';
} else if(isset($_GET['content']) && $_GET['content'] == 'arene' && isset($_SESSION['id']) && $_SESSION['id'] != null) {
    require './templates/header/headerconnecter.php';
    require './templates/content/arene.php';
} else if(isset($_GET['content']) && $_GET['content'] == 'tome' && isset($_SESSION['id']) && $_SESSION['id'] != null) {
    require './templates/header/headerconnecter.php';
    require './templates/content/tomes.php';
} else if( isset($_SESSION['id']) && $_SESSION['id'] != null && isset($_GET['content']) && $_GET['content'] == 'deconnexion' ) {
    require './templates/header/headerconnecter.php';
    require './templates/users/deconnexion.php';
} else if( isset($_SESSION['id']) && $_SESSION['id'] != null && isset($_GET['content']) && $_GET['content'] == 'myprofil' ) {
    require './templates/header/headerconnecter.php';
    require './templates/users/profil.php';
} else if( isset($_SESSION['id']) && $_SESSION['id'] != null  ) {
    require './templates/header/headerconnecter.php';
    require './templates/content/arene.php';
}

// Pas CONNECTE
else if(isset($_GET['content']) && $_GET['content'] == "manga" ) {
    require './templates/header/header.php';
    require './templates/content/singlemanga.php';
}
else if(isset($_GET['content']) && $_GET['content'] == "inscription" ) {
    require './templates/header/header.php';
    require './templates/users/inscription.php';
} else if(isset($_GET['content']) && $_GET['content'] == "connexion" ) {
    require './templates/header/header.php';
    require './templates/users/login.php';
} else if( isset($_GET['action']) && $_GET['action'] == 'addManga' ) {
    require './templates/header/header.php';
    require './templates/users/login.php';
} else if ( isset($_GET['content']) && $_GET['content'] == 'tome')  {
    require './templates/header/header.php';
    require './templates/content/tomes.php';
} else {
    require './templates/header/header.php';
    require './templates/content/arene.php';
}

?>

