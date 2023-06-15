<?php session_start();

require __DIR__.'/../../config/database/link.php';
require __DIR__.'/../../config/data/filter.php';
require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/admin_modale.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

$id_admin = $_SESSION['id'];

$prenom = Filter::get($_POST['prenom']);
$nom = Filter::get($_POST['nom']);
$sexe = Filter::get($_POST['sexe']);
$cni = Filter::get($_POST['cni']);
$tel = Filter::get($_POST['tel']);
$login = Filter::get($_POST['login']);
$password = Filter::get($_POST['password']);

Admin::in($con, $prenom, $nom, $cni, $sexe, $tel, $login, $password);

Link::decon($con);

Route::load('scolarite');
