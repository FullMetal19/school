<?php session_start();

require __DIR__.'/../fileSys/route.php';
require __DIR__.'/../Http/url.php';
require __DIR__.'/../data/filter.php';

$num_page = Filter::get($_GET['item']);
$nom_page = Filter::get($_GET['page']);
$arg = Filter::get($_GET['arg']);

if($num_page == NULL){
    $num_page = 1;
}
switch($nom_page){

    case 'classList': $_SESSION['num_page_pagination_classList'] = $num_page; Route::load('liste-eleve?item='.$arg); break;
    case 'scolarite': $_SESSION['num_page_pagination_scolarite'] = $num_page; Route::load('scolarite'); break;
    default: Route::load('accueil'); break;

}


 
