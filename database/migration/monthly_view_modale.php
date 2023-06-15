<?php

class Vue_mensualite{

/**
 * Permet de faire une selection des donnees d'une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, l'annee en cours et l'identifiant de l'eleve.
 * @return la requette.
 * 
 */
    public static function out($con, $annee, $id_eleve){

        $request = mysqli_query($con,"SELECT * FROM vue_mensualites WHERE annee='$annee' AND id_eleve='$id_eleve'");
        return $request;
    }


/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme identifiants dans la table de la base de donnee cla classe et de l'annee.
 * 
 * @param la connexion a la base de donnee, l'annee en cours et la classe.
 * @return la requette.
 * 
 */
    public static function counter($con, $classe, $annee){

    $request = mysqli_query($con,"SELECT * FROM vue_mensualites WHERE classe='$classe' AND annee='$annee'");
    return mysqli_num_rows($request);
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