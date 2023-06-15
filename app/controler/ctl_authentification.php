<?php session_start();

require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../database/migration/admin_modale.php';
require __DIR__.'/../../database/migration/connexion_modale.php';


/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

/**
 * @var filtre les donnees en entrees du client
 */
$login = Filter::get($_POST['login']) ;

$pswd =  Filter::get($_POST['password']) ;


$data = Admin::lister($con, $login, $pswd) ;


/**
 * @var compte le nombre d'admin ayant ses memes identifiants
 */
$num = Admin::counter($con, $login, $pswd);

/**
 * si c'est 1 cela veut dire qu'il ny a pas de doublure 
 */
if($num == 1){
    
    $_SESSION['prenom'] = $data['prenom']; 
    $_SESSION['nom'] = $data['nom']; 
    $_SESSION['login'] = $data['mail']; 
    $_SESSION['connexion'] = 1; 
    $_SESSION['id'] = $data['id']; 

    Connexion::in($con, $data['id']);
   
    Link::decon($con);

    Route::load('accueil');
}

else{

    $_SESSION['error_connexion'] = 'Se compte nous est inconnu, veillez revoir vos identifiants';

    Link::decon($con);

    Route::load();

}









