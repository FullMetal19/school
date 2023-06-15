<?php

class Vue_comptable{
     
/**
 * Permet de faire une slection dans une vue de la base de donnee tout en calculant la somme totale generee pour chaque classe.
 * 
 * @param la connexion a la base de donnee, le montant total .
 * @param l'annee en cours.
 * @return la requette.
 * 
 */
    public static function out($con, $annee){
         
        $request = mysqli_query($con, "SELECT SUM(montant) as totalPrice, classe FROM `vue_comptables` WHERE annee='$annee' GROUP BY classe");
        return  $request;
    }


/**
 * Permet de faire une slection dans une vue de la base de donnee tout en calculant la somme totale generee pour chaque classe.
 * 
 * @param la connexion a la base de donnee, le montant total .
 * @param l'annee en cours.
 * @param les differentes classes
 * @return la requette.
 * 
 */
    public static function outCons($con, $annee, $classe){
         
        $request = mysqli_query($con, "SELECT SUM(montant) as totalPrice FROM `vue_comptables` WHERE annee='$annee' and classe='$classe' ");
        $data = mysqli_fetch_array($request);
        if(empty($data['totalPrice'])){
            return 0;
        }
        else{ return $data['totalPrice']; }
    }


    
 /**
 * Permet de faire une slection dans une vue de la base de donnee tout en calculant la somme totale generee pour chaque classe.
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