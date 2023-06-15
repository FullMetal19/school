<?php

class Admin{

/**
 * Permet de faire une insertion dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee.
 * @return la requette.
 * 
 */
    public static function in($con, $prenom, $nom, $cni, $sexe, $tel, $login, $password){
         
        $request = mysqli_query($con,"INSERT INTO `administrateurs` VALUES (NULL,'$prenom','$nom','$cni','$sexe','$tel','$login','$password', now())");

        return $request;
    }

/**
 * Permet de compter le nombre d'occurence de ligne ayant les meme identifiants dans la table de la base de donnee en fonction de la contrainte
 * de reconnaissance du login et du password.
 * 
 * @param la connexion a la base de donnee, le login et le mot de passe.
 * @return la requette.
 * 
 */
    public static function counter($con, $login, $pswd){

    $request = mysqli_query($con,"SELECT * FROM administrateurs WHERE login='$login' AND password='$pswd'");
    return mysqli_num_rows($request);
}


/**
 * Permet de faire une selection des donnees d'une table de la base de donnee en fonction de la contrainte
 * de reconnaissance du login et du password.
 * 
 * @param la connexion a la base de donnee, le login et le mot de passe
 * @return la requette.
 * 
 */
    public static function lister($con, $login, $pswd){

    $request = mysqli_query($con,"SELECT * FROM administrateurs WHERE login='$login' AND password='$pswd'");
    return mysqli_fetch_array($request);
}



}