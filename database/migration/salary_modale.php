<?php

class Salaire{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $montant, $mois, $annee, $id_admin, $id_personnel){
         
        $request = mysqli_query($con, "INSERT INTO `salaires` VALUES(null, $montant, '$mois', '$annee', now(), '$id_admin', '$id_personnel')");
        return $request;
    }
  

/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en fonction de la contrainte sur l'identite du personnel.
 * et de l'annee en cours
 * 
 * @param la connexion a la base de donnee et l'identite du personnel et l'annee en cours.
 * @return la requette.
 * 
 */
    public static function out($con, $annee, $id_personnel){

    $request = mysqli_query($con,"SELECT * FROM `salaires` WHERE annee='$annee' AND id_personnel='$id_personnel'");
    return $request;
    }



 /**
 * Permet de compter le montant totale des salaire de la base de donnee durant l'annee en cours.
 * 
 * @param la connexion a la base de donnee, l'annee en cours.
 * @return le montant total des salaires
 * 
 */
    public static function countPrice($con, $annee){
         
        $request = mysqli_query($con, "SELECT SUM(montant) AS totalPrice FROM `salaires` WHERE annee = '$annee'");
        $data = mysqli_fetch_array($request);
        if(empty($data['totalPrice'])){
            return 0;
        }
        else{ return $data['totalPrice']; }
    }


}