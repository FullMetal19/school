<?php

class Note{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $note, $semestre, $annee, $id_admin, $id_eleve){
         
        $request = mysqli_query($con, "INSERT INTO `notes` VALUES(null, $note, '$semestre', '$annee', now(), $id_admin, '$id_eleve')");
        return $request;
    }


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en fonction de la contrainte sur l'identite de l'eleve.
 * 
 * @param la connexion a la base de donnee et l'identite du personnel.
 * @return la requette.
 * 
 */
public static function out($con, $annee, $id_eleve){

    $request = mysqli_query($con, "SELECT * FROM notes WHERE id_eleve='$id_eleve' and annee='$annee'");
    return  $request;
}


 /**
 * Permet de faire une slection dans une table de la base de donnee .
 * 
 * @param une fonction de selection vers la base de donnee.
 * @return un tableau
 * 
 */
public static function lister($resultat){

    $table_donnees = mysqli_fetch_array($resultat);

    return $table_donnees;
}

}