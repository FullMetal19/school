<?php

/**
  * configuration des parametres de connexion avec la base de donnee.
  *
  * @return array.
  *
  * @ key host : nom de domaine du serveur d'hebergement de l'application.
  * @ key name : nom de la base de donnee cree.
  * @ key log  : nom de l'utilisateur de l'administrateur de la base de donnee.
  * @ key pswd : le mot de passe de l'administrateur de la base de donnee.
  *
*/  



 function env($key){ 
    
    $database =  [    

                 'host' => 'localhost',
                 'name' => 'db_school_management',
                 'log'  => 'root',
                 'pswd' => ''

                 ];
    
    return $database[$key];   
}

