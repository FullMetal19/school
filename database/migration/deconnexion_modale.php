<?php

class Deconnexion{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $id_admin){
         
        $request = mysqli_query($con, "INSERT INTO `deconnexions` VALUES(null, now(), $id_admin)");
        return $request;
    }

}