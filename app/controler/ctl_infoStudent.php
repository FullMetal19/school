<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/data/Extract.php';
require __DIR__.'/../../config/data/convertDate.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/mensualite_modale.php';
require __DIR__.'/../../database/migration/current_year_modale.php';



/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

/**
 * @var L'annee en cours 
 */
$cur_year = get_cur_year($con);

$id_admin = $_SESSION['id'];

$date = Filter::get($_POST['mois']);

/**
 * @var Extrait la sous chaine de caractere apres un caractere de seperation quelconque : dans notre cas -> - 
 */
$mois = Extract::afterIndexe($date , '-');

/**
 * @var convertie la valeur au mois correspondant :  ex -> 04 => Avril
 */
echo $mois = Convert::month($mois);

$montant = Filter::get($_POST['montant']);
echo $montant = str_replace(' ', '', $montant);

echo $id_eleve = Filter::get($_GET['id']);

Mensualite::in($con, $montant, $mois, $cur_year, $id_admin, $id_eleve);

Link::decon($con);

Route::load('info-eleve?item='.$id_eleve);

