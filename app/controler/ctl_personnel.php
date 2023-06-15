<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/personnel_modale.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

$id_admin = $_SESSION['id'];   
     
$prenom = Filter::get($_POST['prenom']);
$nom = Filter::get($_POST['nom']);
$sexe = Filter::get($_POST['sexe']);
$date_naiss = Filter::get($_POST['date_naiss']);
$lieu_naiss = Filter::get($_POST['lieu_naiss']);
$profession = Filter::get($_POST['profession']);
$telephone = Filter::get($_POST['telephone']);
$adresse = Filter::get($_POST['adresse']);

Personnel::in($con, $prenom, $nom, $sexe, $date_naiss, $lieu_naiss, $telephone, $adresse, $profession, $id_admin);

Link::decon($con);

Route::load('scolarite');




