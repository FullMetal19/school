<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/current_year_modale.php';
require __DIR__.'/../../database/migration/spent_modale.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

/**
 * @var l'annee en cours
 */
$cur_year = get_cur_year($con);

$id_admin = $_SESSION['id'];   

/**
 * @var le montant de la depense;
 */
$montant = Filter::get($_POST['montant_dep']);
$montant = str_replace (' ', '', $montant);

/**
 * @var La nature de la depense
 */
$nature = Filter::get($_POST['nature']);

Depense::in($con, $montant, $nature, $cur_year, $id_admin);

Link::decon($con);

Route::load('scolarite');




