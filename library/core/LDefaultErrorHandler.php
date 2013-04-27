<?php

function __LDefaultErrorHandler($errno, $errstr, $errfile, $errline) {
    echo $errno . "\n";
    echo $errstr . "\n";
    echo $errfile . "\n";
    echo $errline . "\n";
    
    //die();
}

set_error_handler('__LDefaultErrorhandler', E_ALL);

?>