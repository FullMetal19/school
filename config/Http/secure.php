<?php 
require_once('url.php');
require __DIR__.'/../fileSys/route.php';

function secureUrl(){


    if(empty($_SESSION['connexion'])){
        Route::load();
    }
}