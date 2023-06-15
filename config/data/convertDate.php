<?php


class Convert{

    public static function month($arg){
          
        switch($arg){

            case '01' : return 'Janvier'; break;
            case '02' : return 'Fevrier'; break;
            case '03' : return 'Mars'; break;
            case '04' : return 'Avril'; break;
            case '05' : return 'Mai'; break;
            case '06' : return 'Juin'; break;
            case '07' : return 'Juillet'; break;
            case '08' : return 'Aout'; break;
            case '09' : return 'Septembre'; break;
            case '10' : return 'Octobre'; break;
            case '11' : return 'Novembre'; break;
            case '12' : return 'Decembre'; break;

            default : return null ; break;
        }
    }
}