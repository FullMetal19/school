<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/data/Extract.php';
require __DIR__.'/../../config/data/convertDate.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/salary_modale.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

$id_admin = $_SESSION['id'];

$date = Filter::get($_POST['mois']);

/**
 * @var Extrait la sous chaine de caractere avant un caractere de seperation quelconque : dans notre cas -> - 
 */
$annee = Extract::beforeIndexe($date , '-'); 

/**
 * @var Extrait la sous chaine de caractere apres un caractere de seperation quelconque : dans notre cas -> - 
 */
$mois = Extract::afterIndexe($date , '-');

/**
 * @var convertie la valeur au mois correspondant :  ex -> 04 => Avril
 */
$mois = Convert::month($mois);

$montant = Filter::get($_POST['montant']);
$montant = str_replace(' ', '', $montant);

$id_personnel = Filter::get($_GET['id']);

Salaire::in($con, $montant, $mois, $annee, $id_admin, $id_personnel);

Link::decon($con);

Route::load('scolarite');
