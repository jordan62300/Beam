<?php

include('utils.php');

use Form\FormManga;

$formmanga = new FormManga();
if($_SERVER['REQUEST_METHOD'] === 'POST') { 

$description = $_POST['description'];   
$formmanga->onSubmit($_FILES['fic']['name'] ,$_FILES['fic']['size'] ,$_FILES['fic']['type'] ,$description,$_FILES['fic']['tmp_name'] );
}

?>

<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <h3>Envoi d'une image</h3>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
         <input type="text" name="description" />
         <input type="submit" value="Envoyer" />
      </form>
   </body>
</html>