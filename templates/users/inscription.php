
<?php
include('utils.php');

use Form\FormInscription;

$form = new FormInscription();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form->onSubmit($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['telephone'],$_POST['utilisateur'],$_POST['password'],$_POST['password2']);
}

?>

<head>
    <link rel="stylesheet" href="templates/styles/form.css">
</head>


<body>
    <h1 class="text-center title">Inscription </h1>
    <div class="container">
        <form class="mangaForm" action="" method="post">
            <div class="item-group">
                <label for="prenom">prenom</label>
                <input type="text" name="prenom">
            </div>

            <div class="item-group">
                <label for="nom">nom</label>
                <input type="text" name="nom">
            </div>

            <div class="item-group">
                <label for="email">email</label>
                <input type="email" name="email">
            </div>

            <div class="item-group">
                <label for="telephone">telephone</label>
                <input type="number" name="telephone">
            </div>

            <div class="item-group">
                <label for="utilisateur">utilisateur</label>
                <input type="text" name="utilisateur">
            </div>

            <div class="item-group">
                <label for="password">mot de passe</label>
                <input type="password" name="password">
            </div>

            <div class="item-group">
                <label for="password2">confirmer le mot de passe</label>
                <input type="password" name="password2">
            </div>

            <button class="btn-submit" type="submit">Envoyer</button>
    </form>
   </div>
</body>
</html>
