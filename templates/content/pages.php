
<?php
include('utils.php');

use Mangas\Page;
use Mangas\Tome;

$pageInstance = new Page();
$tomeInstance = new Tome();

$userId = $tomeInstance->getTomeJoinByMangaId();

$pages = $pageInstance->getPageByTomeId();


$number = 0;

if(isset($pages[$number]->imgnom)) {
    echo 'hello';
} else {
    echo 'goodbye';
}

// var_dump($_POST['incresedNumber']);

if(isset($_POST['incresedNumber'])) {
    $number =   $_POST['incresedNumber'];
} else if(isset($_POST['decreasedNumber'])) {
    $number =   $_POST['decreasedNumber'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="templates/styles/arene.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" defer></script>
    <script src="../public/js/turnImage.js" defer></script>
    <title>Document</title>
</head>
<body>
    <h1>Page</h1>

   
        <div id=<?=$number?> class='items'>
        
<img class='img' src='/images/Page/<?=$pages[$number]->imgnom?>' />
       
        </div>
        <?php if(isset($_SESSION['id']) && $userId[0]->user_id == $_SESSION['id']) {
       echo "  <a href='index.php?action=addPage&tomeId=".$_GET['tomeId']."'> Ajouter une Page
";
   } else {
      
   }
   ?>
   <button  class="btn-remove">Precedent</button>
   <button  class="btn-add">Suivant</button>
    
    
</body>
</html>
