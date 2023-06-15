<?php


/**
  * c'est l'url de base de l'application.
  *
  * @return $url : est le lien d'url de l'application.
  *
*/



function url($page=NULL){

    /**
     * @var entete de l'url. 
     * 
     */
    $urlHead = 'http://' ;


    /**
     * @var le nom de dommaine de l'hebergement.
     * 
     */   
    $host = 'localhost' ;


    /**
     * @var le nom du fichier principale de l'application.
     */
    $mainFile = 'school';


      
    $url =  $urlHead.$host.'/'.$mainFile.'/'.$page;

     
    return $url;
}



