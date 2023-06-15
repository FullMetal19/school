<?php   

/**
 *  @param le nom de la variable de ssseion a utilser temporairement pour notifier
 */

  function notify($arg_session){
           
    if (isset($_SESSION[$arg_session])){
        echo $_SESSION[$arg_session];
    }
        unset($_SESSION[$arg_session]);
}