
<?php
include('utils.php');
require 'vendor/autoload.php';

$_SESSION['id'] = null;

session_start();


use Mangas\Manga;
use Mangas\Like;
use Mangas\Dislike;
use Mangas\Page;
use Mangas\Tome;
use Access\Deconnexion;
use Form\FormInscription;
use Form\FormLogin;
use Form\FormManga;
use Form\FormPage;
use Form\FormTome;


$mangaInstance = new Manga();
$likes = new Like();
$dislike = new Dislike();
$pageInstance = new Page();
$tomeInstance = new Tome();
$deconnexion = new Deconnexion();
$inscriptionInstance = new FormInscription();
$loginInstance = new FormLogin();
$formmangaInstance = new FormManga();
$formPageInstance = new FormPage();
$formTomeInstance = new FormTome();




$mangaInstance->connexion();

$loader = new \Twig\Loader\FilesystemLoader('templates');       // Chemin qui pointe vers le dossier templates pour twig
$twig = new \Twig\Environment($loader);                         // twig instance

$tomes = $tomeInstance->getTomeJoinByMangaId();    // Recupere le userId
$chapitres = $tomeInstance->getTomeByMangaId();     // Recupere les chapitres par l'id du manga
$pages = $pageInstance->getPageByTomeId();          // recupere la page en fonction du tome id
$manga = $mangaInstance->getMangaById();       //  Recupere le manga en fonction de son id 
$mangas = $mangaInstance->getMangaByLike();    // Recupere les mangas classé par like
$userId = $mangaInstance->getUserIdByMangaId();



// Envoie du formulaire de connexion 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['SendLogin'])) {   
    $loginInstance->onSubmit($_POST['utilisateur'],$_POST['password']);
}


$number = 0;
$tomeId = null;

// Definie le header a utiliser 

/*
if(isset($_SESSION['id']) && $_SESSION['id'] != null){
    $headerLayout = './header/headerconnecter.html.twig';
} else {
}
*/
$headerLayout = './header/header.html.twig';

// Recupere l'id du tome actuel

if(isset($_GET['tomeId'])){
    $tomesId = $_GET['tomeId'];
}

// Recupere un Post ajax pour le changement d'id du champ select

if(isset($_POST['tomeSelectedId'])) {             
    $id = $_POST['tomeSelectedId'];                 
}

// Recupere un Post ajax pour le changement de l'index de page

if(isset($_POST['incresedNumber'])) {               
    $number =   $_POST['incresedNumber'];
} else if(isset($_POST['decreasedNumber'])) {
    $number =   $_POST['decreasedNumber'];
}

 // Recupere les likes et dislikes et verifie si deja vote

if(isset($_GET['action']) && $_GET['action'] == 'like') {          
    $likes->checkHasLikedOnce($_GET['mangaId'] , $_SESSION['id']);
} else if(isset($_GET['action']) && $_GET['action'] == 'dislike') {
    $dislike->checkHasDislikedOnce($_GET['mangaId'] , $_SESSION['id']);
}

// Inscription

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['SendInscription']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone'])&& isset($_POST['utilisateur'])&& isset($_POST['password'])&& isset($_POST['password2']))
    $inscriptionInstance->onSubmit($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['telephone'],$_POST['utilisateur'],$_POST['password'],$_POST['password2']);
}

// Deconnexion 

if(isset($_GET['content']) && $_GET['content'] == 'deconnexion') {
    $deconnexion = new Deconnexion();
    $deconnexion->deconnexionUser();
} else {
  //  header('location:index.php?content=arene');
}

// Ajout d'un Manga 

if($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if(isset($_POST['ajoutManga'])) {

    $description = $_POST['description'];   
    $formmangaInstance->onSubmit($_POST['nomdumanga'],$_FILES['fic']['name'] ,$_FILES['fic']['size'] ,$_FILES['fic']['type'] ,$description,$_FILES['fic']['tmp_name'] );
    }
}

// Ajout d'un Chapitre

if($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if(isset($_POST['ajoutTome'])) {

    $description = $_POST['description'];   
    $formTomeInstance->onSubmit($_POST['nomChapitre'],$_POST['description']);
    }
}

// Ajout d'une Page

if($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if(isset($_POST['ajoutPage'])) {

    $description = $_POST['description'];   
    $formPageInstance->onSubmit($_FILES['fic']['name'] ,$_FILES['fic']['size'] ,$_FILES['fic']['type'] ,$description,$_FILES['fic']['tmp_name'] );
    }
}



// TEMPLATE LOADER 

    // Page de lecture

if(isset($_GET['content']) && $_GET['content'] == "read") {
echo $twig->render('content/test.html.twig', [
    'name' => 'Jordan',
    'manga' => $manga ,
    'chapitres' => $chapitres,
    'pages' => $pages,
    'number' => $number,
    'tomeId' => $tomeId,
    'sessionId' => $_SESSION['id'],
    'mangaUserId' => $userId,
    'headerLayout' => $headerLayout

    ]);

    //Page d'inscription    
} else if(isset($_GET['content']) && $_GET['content'] == 'inscription') {
    echo $twig->render('users/inscription.html.twig', [
        'headerLayout' => $headerLayout,
        ]);
} else if(isset($_GET['content']) && $_GET['content'] == 'deconnexion') {   // Page de déconnexion
    $deconnexion = new Deconnexion();
    $deconnexion->deconnexionUser();

} else if(isset($_GET['content']) && $_GET['content'] == 'connexion') {     // Page de connexion
    echo $twig->render('users/login.html.twig', [
        'headerLayout' => $headerLayout,
        ]);
} else if(isset($_GET['action'])  && $_GET['action'] == 'addManga' && isset($_SESSION['id']) && $_SESSION['id'] != null ) { // Page ajout de manga
    echo $twig->render('form/formulairemanga.php', [
        'headerLayout' => $headerLayout,
        ]);
} else if(isset($_GET['action'])  && $_GET['action'] == 'addChapitre' && isset($_SESSION['id']) && $_SESSION['id'] != null ) { // Page ajout de manga
    echo $twig->render('form/formulairetome.php', [
        'headerLayout' => $headerLayout,
        ]);
} else if(isset($_GET['content']) && $_GET['content'] == 'arene') {     // Page de connexion
    echo $twig->render('content/arene.html.twig', [
        'headerLayout' => $headerLayout,
        'mangas' => $mangas ,
        
        ]);
}  else if(isset($_GET['action'])  && $_GET['action'] == 'addPage' && isset($_SESSION['id']) && $_SESSION['id'] != null ) { // Page ajout de manga
    echo $twig->render('form/formulairepage.php', [
        'headerLayout' => $headerLayout,
        
        ]);
}   else {

echo $twig->render('content/accueil.html.twig', [       // Page accueil
    'name' => 'Fabien' ,
    'mangas' => $mangas ,
    'headerLayout' => $headerLayout
    ]);
}
    




