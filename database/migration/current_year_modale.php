<?php


     
/**
 * Permet de faire une mise ajour dans une table de la base de donnee.
 * 
 * @param la connexion a la base de donnee, l'annee et l'identifiant de l'administrateur.
 * @return la requette.
 * 
 */
    function update($con, $annee, $id_admin){
         
        $request = mysqli_query($con, "UPDATE `session_academique` SET annee='$annee',`date`=now(), id_admin= $id_admin  WHERE 1");
        return $request;
    }


/**
 * Donne l'annee en cours scolaire.
 * @param la connexion a la base de donnee, le montant total .
 * @return l' annee en cours en format (0000/0000).
 */

function get_cur_year($con){
    
    $request = mysqli_query($con,"SELECT * FROM session_academique"); 
    $liste = mysqli_fetch_array($request);
    return $liste['annee'];
} 