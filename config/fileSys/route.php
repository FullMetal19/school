<?php

/**
 * ___________________________________________________________________________________________
 * |  
 * |  Permet de charger les classes de l'application dans leurs fichiers .php repectifs
 * |  Il chargera toutes les classes d'un dossier
 * |   C'est un autoloader qui va utilise le require_once, ou require __DIR__ etc
 * |__________________________________________________________________________________________
 * 
 */


 class Route{
       


    public static function load($page=NULL){
        

              header('location: '.url($page).'');

          }
 }