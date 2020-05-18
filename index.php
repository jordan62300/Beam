
<?php
 include('utils.php');

// require 'vendor/autoload.php';

use Mangas\Manga;
use Mangas\Like;
use Mangas\Dislike;
use Mangas\Page;
use Mangas\Tome;
use Access\Deconnexion;
use Access\Connexion;
use Form\FormInscription;
use Form\FormLogin;
use Form\FormManga;
use Form\FormPage;
use Form\FormTome;


$_SESSION['id'] = null;

session_start();





$mangaInstance = new Manga();
$likes = new Like();
$dislike = new Dislike();
$pageInstance = new Page();
$tomeInstance = new Tome();
$deconnexion = new Deconnexion();
$inscriptionInstance = new FormInscription();
$connexionInstance = new Connexion();
$loginInstance = new FormLogin();
$formmangaInstance = new FormManga();
$formPageInstance = new FormPage();
$formTomeInstance = new FormTome();






$loader = new \Twig\Loader\FilesystemLoader('templates');       // Chemin qui pointe vers le dossier templates pour twig
$twig = new \Twig\Environment($loader, [
    'debug' => true,
]);                         // twig instance
$twig->addExtension(new \Twig\Extension\DebugExtension());
$twig->addGlobal("session", $_SESSION);



$mangaInstance->connexion();
$tomes = $tomeInstance->getTomeJoinByMangaId();    // Recupere le userId
$chapitres = $tomeInstance->getTomeByMangaId();     // Recupere les chapitres par l'id du manga
$pages = $pageInstance->getPageByTomeId();          // recupere la page en fonction du tome id
$manga = $mangaInstance->getMangaById();       //  Recupere le manga en fonction de son id 
$mangas = $mangaInstance->getMangaByLike();    // Recupere les mangas classé par like
$userId = $mangaInstance->getUserIdByMangaId();



// Envoie du formulaire de connexion 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['SendLogin'])) { 
    $utilisateur =   htmlspecialchars($_POST['utilisateur'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $loginInstance->onSubmit($utilisateur,$password);
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
$headerLayout = './header/headerDeux.html.twig';

// Recupere l'id du tome actuel

if(isset($_GET['tomeId'])){
    $tomesId = htmlspecialchars($_GET['tomeId']);
}

// Recupere un Post ajax pour le changement d'id du champ select

if(isset($_POST['tomeSelectedId'])) {   
       
    $id = htmlspecialchars($_POST['tomeSelectedId'], ENT_QUOTES);                  
}

// Recupere un Post ajax pour le changement de l'index de page

if(isset($_POST['incresedNumber'])) {               
    $number =   htmlspecialchars($_POST['incresedNumber'], ENT_QUOTES);
} else if(isset($_POST['decreasedNumber'])) {
    $number =   htmlspecialchars($_POST['decreasedNumber'], ENT_QUOTES);
}

 // Recupere les likes et dislikes et verifie si deja vote

if(isset($_GET['action']) && $_GET['action'] == 'like') {          
    $likes->checkHasLikedOnce(htmlspecialchars($_GET['mangaId']) , $_SESSION['id']);
} else if(isset($_GET['action']) && $_GET['action'] == 'dislike') {
    $dislike->checkHasDislikedOnce(htmlspecialchars($_GET['mangaId']) , $_SESSION['id']);
}

// Inscription

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['SendInscription']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone'])&& isset($_POST['utilisateur'])&& isset($_POST['password'])&& isset($_POST['password2']))
  $prenom =  htmlspecialchars($_POST['prenom'], ENT_QUOTES);
  $nom =  htmlspecialchars($_POST['nom'], ENT_QUOTES);
  $email =  htmlspecialchars($_POST['email'], ENT_QUOTES);
  $telephone =  htmlspecialchars($_POST['telephone'], ENT_QUOTES);
  $utilisateur =  htmlspecialchars($_POST['utilisateur'], ENT_QUOTES);
  $password =  htmlspecialchars($_POST['password'], ENT_QUOTES);
  $password2 =  htmlspecialchars($_POST['password2'], ENT_QUOTES);
    $inscriptionInstance->onSubmit( $prenom, $nom,$email,$telephone,$utilisateur,$password,$password2);
}

// Connexion

// Session ID 

$sessionId = $connexionInstance->getSessionId();


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

    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);  
    $nomdumanga = htmlspecialchars($_POST['nomdumanga'], ENT_QUOTES); 
    $formmangaInstance->onSubmit($nomdumanga,$_FILES['fic']['name'] ,$_FILES['fic']['size'] ,$_FILES['fic']['type'] ,$description,$_FILES['fic']['tmp_name'] );
    }
}

// Ajout d'un Chapitre

if($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if(isset($_POST['ajoutTome'])) {

    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $nomChapitre = htmlspecialchars($_POST['nomChapitre'], ENT_QUOTES);     
    $formTomeInstance->onSubmit($nomChapitre,$description);
    }
}

// Ajout d'une Page

if($_SERVER['REQUEST_METHOD'] === 'POST') { 

    if(isset($_POST['ajoutPage'])) {

    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
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
    'sessionId' => $sessionId,
    'mangaUserId' => $userId,
    'headerLayout' => $headerLayout

    ]);

     
} else if(isset($_GET['content']) && $_GET['content'] == "classement") {   //Page de classement  
    echo $twig->render('content/classement.html.twig', [
        'name' => 'Jordan',
        'headerLayout' => $headerLayout,
        ]);
    
} else if(isset($_GET['content']) && $_GET['content'] == 'inscription') {   //Page d'inscription   
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
} else if(isset($_GET['content']) && $_GET['content'] == 'profil') {     // Page de connexion
    echo $twig->render('users/profil/profilprojet.html.twig', [
        'headerLayout' => $headerLayout,
        'name' => 'jordan'
        ]);
}  else if(isset($_GET['action'])  && $_GET['action'] == 'addManga' && isset($_SESSION['id']) && $_SESSION['id'] != null ) { // Page ajout de manga
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

echo $twig->render('content/accueilDeux.html.twig', [       // Page accueil
    'name' => 'Fabien' ,
    'mangas' => $mangas ,
    'headerLayout' => $headerLayout
    ]);
}
    




