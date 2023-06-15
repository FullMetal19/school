<?php

class Student{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $id, $prenom, $nom, $sexe, $date_naiss, $lieu_naiss, $adresse, $nom_parent, $tel_parent){
         
        $request = mysqli_query($con, "INSERT INTO eleves VALUES('$id', '$prenom', '$nom', '$sexe', '$date_naiss', '$lieu_naiss', '$adresse', '$nom_parent', '$tel_parent')");
        return $request;
    }


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en fonction de l'identite de l'eleve.
 * 
 * @param la connexion a la base de donnee et l'identite de l'eleve.
 * @return la requette.
 * 
 */
   public static function out($con, $id_eleve){

    $request = mysqli_query($con,"SELECT * FROM eleves ");
    return  mysqli_fetch_array($request);
}




}