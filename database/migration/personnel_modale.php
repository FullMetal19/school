<?php

class Personnel{
     
/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $prenom, $nom, $sexe, $date_naiss, $lieu_naiss, $telephone, $adresse, $profession, $id_admin){
         
        $request = mysqli_query($con, "INSERT INTO personnels VALUES(NULL, '$prenom', '$nom', '$sexe', '$date_naiss', '$lieu_naiss', '$telephone', '$adresse', '$profession', now(), $id_admin)");
        return $request;
    }


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en bordant la selection.
 * 
 * @param la connexion a la base de donnee, l'indice de selection de debut et le nombre de ligne a extraire.
 * @return la requette.
 * 
 */
   public static function outLimit($con, $index_debut, $nbre_items){

    $request = mysqli_query($con,"SELECT * FROM personnels ORDER BY nom LIMIT $index_debut, $nbre_items ");
    return  $request;
}


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en fonction de la contrainte sur l'identite du personnel.
 * 
 * @param la connexion a la base de donnee et l'identite du personnel.
 * @return la requette.
 * 
 */
public static function out($con, $id_personnel){

    $request = mysqli_query($con, "SELECT * FROM personnels WHERE id='$id_personnel'");
    $data = mysqli_fetch_array($request);
    return  $data;
}


/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme identifiants dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
public static function counter($con){

    $request = mysqli_query($con,"SELECT * FROM personnels");
    return mysqli_num_rows($request);
}


/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme professions dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, la profession du personnel.
 * @return la requette.
 * 
 */
public static function countWith($con, $profession){

    $request = mysqli_query($con,"SELECT * FROM personnels WHERE profession='$profession'");
    return mysqli_num_rows($request);
}


/**
 * Permet de compter le nombre d'occurence de ligne n'ayant pas les meme professions dans la table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, la profession du personnel.
 * @return la requette.
 * 
 */
public static function countWithOut($con, $profession){

    $request = mysqli_query($con,"SELECT * FROM `personnels` WHERE profession != 'professeur' ");
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