<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/current_year_modale.php';


/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();


$id_admin = $_SESSION['id'];

$annee = Filter::get($_POST['annee']);

update($con, $annee, $id_admin);

Link::decon($con);

Route::load('comptabilite');
