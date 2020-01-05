<?php

include('utils.php');

use Form\FormLogin;

$form = new FormLogin();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form->onSubmit($_POST['utilisateur'],$_POST['password']);
}

?>

<head>
    <link rel="stylesheet" href="templates/styles/form.css">
</head>

<body>
    <h1 class="text-center title">Connexion </h1>
    <div class="container">
        <form class="mangaForm"  action="" method="post">

            <div class="item-group">
                <label for="utilisateur">Utilisateur</label>
                <input type="text" name="utilisateur">
            </div>

            <div class="item-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password">
            </div>

            <button class="btn-submit" type="submit">Envoyer</button>
        </form>
   </div>
</body>
</html>