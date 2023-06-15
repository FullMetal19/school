<?php

Class Fact{

    /**
     * permet d'instancier les objets des classes de l'application.
     * 
     * @param le nom de la classe a instancier.
     * @return un objet.
     * 
     */

    public static function creator($class_name, $param=NULL){
          
        return new $class_name($param);

    }
 
}