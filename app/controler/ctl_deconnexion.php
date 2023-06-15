<?php session_start();

require __DIR__.'/../../config/fileSys/route.php';
require __DIR__.'/../../config/Http/url.php';
require __DIR__.'/../../database/migration/deconnexion_modale.php';
require __DIR__.'/../../config/database/link.php';

/**
 * @var connexion avec la base de donnee
 */
$con = Link::con();

$id_admin = $_SESSION['id'];

Deconnexion::in($con, $id_admin);

Link::decon($con);

session_destroy();

Route::load();

?>