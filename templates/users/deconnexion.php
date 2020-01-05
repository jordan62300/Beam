<?php

include('utils.php');

use Access\Deconnexion;

$deconnexion = new Deconnexion();

if(isset($_GET['content']) && $_GET['content'] == 'deconnexion') {
    $deconnexion = new Deconnexion();
    $deconnexion->deconnexionUser();
} else {
    header('location:index.php?content=arene');
}

?>