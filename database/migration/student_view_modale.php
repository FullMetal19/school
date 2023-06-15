<?php

class Vue_eleve{

/**
 * Permet de faire une selection des donnees d'une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function out($con, $annee, $id_eleve){

        $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE annee='$annee' AND id_eleve='$id_eleve'");
        return $request;
    }



/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme identifiants dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, la classe et l'annee.
 * @return la requette.
 * 
 */
    public static function counter($con, $classe, $annee){

    $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE classe='$classe' AND annee='$annee'");
    return mysqli_num_rows($request);
}



/**
 * Permet de faire une selection de ligne ayant les meme identifiants dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, la classe et l'annee.
 * @return la requette.
 * 
 */
    public static function outLimit($con, $classe, $annee, $index_debut, $nbre_items){

    $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE classe='$classe' AND annee='$annee' ORDER BY nom LIMIT $index_debut, $nbre_items");
    return $request;
}



/**
 * Permet de faire une selection de ligne ayant les meme identifiants dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, le sexe et l'annee.
 * @return la requette.
 * 
 */
    public static function countCons($con, $annee, $sexe){

    $request = mysqli_query($con,"SELECT * FROM vue_eleves WHERE annee='$annee' AND sexe='$sexe'");
    return mysqli_num_rows($request);
}



/**
 * Permet de faire une selection des donnees d'une table de la base de donnee .
 * 
 * @param la une autre fonction de selection.
 * @return la table de donnee.
 * 
 */
   public static function lister($resultat){

    $table_donnees = mysqli_fetch_array($resultat);
    return $table_donnees;
}


}