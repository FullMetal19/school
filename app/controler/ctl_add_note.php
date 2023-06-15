<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/note_modale.php';
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

$semestre = Filter::get($_POST['semestre']);
$note = Filter::get($_POST['note']);
$id_eleve = Filter::get($_GET['id']);

Note::in($con, $note, $semestre, $cur_year, $id_admin, $id_eleve);

Link::decon($con);

Route::load('info-eleve?item='.$id_eleve);
