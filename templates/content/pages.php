<?php
include('utils.php');

use Mangas\Page;
use Mangas\Tome;

$pageInstance = new Page();
$tomeInstance = new Tome();

$userId = $tomeInstance->getTomeJoinByMangaId();

$pages = $pageInstance->getPageByTomeId();


$number = 0;

$pageInstance->dd($pages);
if(isset($pages[$number]->imgnom)) {
    echo 'hello';
} else {
    echo 'goodbye';
}


// var_dump($_POST['incresedNumber']);

if(isset($_POST['incresedNumber'])) {

  
    $number =   $_POST['incresedNumber'];
var_dump($number);
        
 

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
    <script src="turn.js" defer></script>
    <title>Document</title>
</head>
<body>
    <h1>Page</h1>

   
        <div class='items'>
        <?php if(isset($pages[$number]->imgnom)): ?>
        <a href="index.php?content=page&mangaId=<?=$_GET['mangaId']?>&tomeId=<?=$_GET['tomeId']?>"><img class='img' src='images/Page/<?=$pages[$number]->imgnom?>' /></a>
        <?php endif; ?>
        </div>
        <?php if(isset($_SESSION['id']) && $userId[0]->user_id == $_SESSION['id']) {
       echo "  <a href='index.php?action=addPage&tomeId=".$_GET['tomeId']."'> Ajouter une Page
";
   } else {
      
   }
   ?>
    
    
</body>
</html>