<?php

require_once('config.php');

class Link{

    /**
      * Etablit la connnection avec la base de donnee.
      *
      * @return con : les informations d'une potentielle connectivite ou non a la base de donnee.
      *
    */

    public static function con(){
         
        try {

            $con = mysqli_connect(env('host'), env('log'), env('pswd'), env('name'));
    
        } catch (Throwable $th) {

             die('Erreur de connexion vers la base de donnee');
             
        }
    
        return  $con;

    }


    /**
       * Met fin a la connectiion avec la base de donnee.
       * 
       *  @param con : la connexion avec la base de donnee.
       *  
    */

    public static function decon($con){

        mysqli_close($con);
    }

    
}