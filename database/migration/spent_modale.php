<?php

class Depense{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $montant, $nature, $annee, $id_admin){
         
        $request = mysqli_query($con, "INSERT INTO `depenses` VALUES(NULL, $montant, '$nature', '$annee', NOW(), $id_admin)");
        return $request;
    }


 /**
 * Permet de compter le montant totale des depenses de la base de donnee durant l'annee en cours.
 * 
 * @param la connexion a la base de donnee, l'annee en cours.
 * @return le montant total des salaires
 * 
 */    
    public static function countPrice($con, $annee){
         
        $request = mysqli_query($con, "SELECT SUM(montant) AS totalPrice FROM `depenses` WHERE annee = '$annee'");
        $data = mysqli_fetch_array($request);
        if(empty($data['totalPrice'])){
            return 0;
        }
        else{ return $data['totalPrice']; }
    }


}