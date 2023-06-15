<?php

class Register{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $montant, $classe, $annee, $id_admin, $id_eleve){
         
        $request = mysqli_query($con, "INSERT INTO `inscritptions` VALUES(null, $montant, '$classe', '$annee', now(), $id_admin, '$id_eleve')");
        return $request;
    }


/**
 * Permet de faire une slection dans une vue de la base de donnee tout en calculant la somme totale generee pour chaque classe.
 * 
 * @param la connexion a la base de donnee, l'annee en cours .
 * @return le montant total des inscriptions.
 * 
 */
    public static function countPrice($con, $annee){
         
        $request = mysqli_query($con, "SELECT SUM(montant) AS totalPrice FROM `inscritptions` WHERE annee = '$annee'");
        $data = mysqli_fetch_array($request);
        if(empty($data['totalPrice'])){
            return 0;
        }
        else{ return $data['totalPrice']; }
    }


}