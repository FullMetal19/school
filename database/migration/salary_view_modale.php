<?php

class Vue_salaire{

/**
 * Permet de faire une selection des donnees d'une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function out($con, $annee, $id_personnel){

        $request = mysqli_query($con,"SELECT * FROM vue_salaire WHERE annee='$annee' AND id_personnel='$id_personnel'");
        return $request;
    }


/**
 * Permet de faire une slection dans une table de la base de donnee .
 * 
 * @param une fonction de selection vers la base de donnee.
 * @return un tableau de donnee.
 * 
 */
   public static function lister($resultat){

    $table_donnees = mysqli_fetch_array($resultat);

    return $table_donnees;
}


}