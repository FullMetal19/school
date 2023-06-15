<?php

class Mensualite{


/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
public static function in($con, $montant, $mois, $annee, $id_admin, $id_eleve){
         
    $request = mysqli_query($con, "INSERT INTO `mensualites` VALUES(null, $montant, '$mois', '$annee', now(), '$id_admin', '$id_eleve')");
    return $request;
}


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee.
 * @param la connexion a la base de donnee, l'annee en cours et l'identifiant de l'eleve.
 * @return la requette.
 * 
 */
    public static function out($con, $annee, $id_eleve){

        $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE annee='$annee' AND id_eleve='$id_eleve'");
        return $request;
    }


/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme identifiants dans la table de la base de donnee en fonction de la contrainte
 * de reconnaissance de la classe et de l'annee.
 * @param la connexion a la base de donnee, l'annee en cours et l'identifiant de l'eleve.
 * @return la requette.
 * 
 */
    public static function counter($con, $classe, $annee){

    $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE classe='$classe' AND annee='$annee'");
    return mysqli_num_rows($request);
}


 /**
 * Permet de faire une slection dans une table de la base de donnee .
 * @param une fonction de selection vers la base de donnee.
 * @return un tableau
 * 
 */
   public static function lister($resultat){

    $table_donnees = mysqli_fetch_array($resultat);
    return $table_donnees;
}



 /**
 * Permet de compter le montant totale de la mensualite de la base de donnee durant l'annee en cours.
 * @param la connexion a la base de donnee, l'annee en cours.
 * @return un tableau
 * 
 */
public static function countPrice($con, $annee){
         
    $request = mysqli_query($con, "SELECT SUM(montant) AS totalPrice FROM `mensualites` WHERE annee = '$annee'");
    $data = mysqli_fetch_array($request);
    if(empty($data['totalPrice'])){
        return 0;
    }
    else{ return $data['totalPrice']; }
}


}



