<?php session_start();
 require __DIR__.'/../../../config/Http/url.php'; 
 require __DIR__.'/../../../config/Http/secure.php'; 
/**
 * ______________________________________________________________________________
 * |
 * |     Class pour le menu principale du site
 * |_____________________________________________________________________________
 * 
 */


class Header{
 
    public function __construct(){  secureUrl();  ?>

             
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> School </title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="ressource/morris.js-0.5.1/morris.js"></script>
    <link rel="stylesheet" href="ressource/morris.js-0.5.1/morris.css">
</head>
<body>

     <header class="BarHeader">

         <span class="logo">  REBAR <small> school </small>  </span>

         <input type="checkbox" id="checker"> <label for="checker" id="boutonMenu">&#9776</label>

         <ul class="BoxNav">
             <li class="listeItems navItems"><a href="<?php echo url('accueil') ?>" class="liens liensNav" id="accueil" >Accueil</a></li>
             <li class="listeItems navItems"><a href="<?php echo url('scolarite') ?>" class="liens liensNav" id="scolarite" >Scolarite</a></li>
             <li class="listeItems navItems"><a href="<?php echo url('comptabilite') ?>" class="liens liensNav" id="comptabilite" >Comptabilite</a></li>
             <li class="listeItems navItems"><a href="<?php echo url('app/controler/ctl_deconnexion.php') ?>" class="liens liensNav" id="deconnexion" >Deconnexion</a></li>
         </ul>
     </header>  
     <div class="espace"></div>


     

<?php
        

    }

}