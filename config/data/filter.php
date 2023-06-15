<?php



class Filter{ 

    public static function get($arg){

        if(isset($arg)){

            $variable = filter_var($arg);
            $variable = htmlspecialchars($variable);

        }

        else{

            $variable = null;

        }

            return $variable;

        }
    }