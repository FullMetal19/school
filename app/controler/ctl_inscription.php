<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/student_modale.php';
require __DIR__.'/../../database/migration/registration_modale.php';
require __DIR__.'/../../database/migration/current_year_modale.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

/**
 * @var L'annee en cours 
 */
$cur_year = get_cur_year($con);

/**
 * @var identifiant (aleatoire par la fonction uniqid) de l'eleve a inscrire
 */
$id_eleve = uniqid();

$id_admin = $_SESSION['id'];    

$prenom = Filter::get($_POST['prenom']);
$nom = Filter::get($_POST['nom']);
$sexe = Filter::get($_POST['sexe']);
$date_naiss = Filter::get($_POST['date_naiss']);
$lieu_naiss = Filter::get($_POST['lieu_naiss']);
$adresse = Filter::get($_POST['adresse']);
$montant = Filter::get($_POST['montant']);
$classe = Filter::get($_POST['classe']);
$nom_parent = Filter::get($_POST['nom_parent']);
$tel_parent = Filter::get($_POST['tel_parent']);

Student::in($con, $id_eleve, $prenom, $nom, $sexe, $date_naiss, $lieu_naiss, $adresse, $nom_parent, $tel_parent);
Register::in($con, $montant, $classe, $cur_year, $id_admin, $id_eleve);

Link::decon($con);

Route::load('scolarite');