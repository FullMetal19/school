<?php

class Extract{


 Public static function beforeIndexe($arg1, $arg2){

    $text = '';

    for($i=0; $i< strlen($arg1); $i++){

        if($arg1[$i] != $arg2){
            $text.=$arg1[$i];
        }
        else{ break; }
    }

     return $text;
}


Public static function afterIndexe($arg1, $arg2){

    $first_text = '';
    $last_text = '';

    for($i=strlen($arg1)-1; $i>=0; $i--){ 

        if($arg1[$i] != $arg2){
            $first_text.= $arg1[$i];
        }
        else{ break; }
    }
       
    for($j=strlen($first_text)-1; $j>=0; $j--){ 
             
        $last_text .= $first_text[$j];
    }
     
     return $last_text;
}



}