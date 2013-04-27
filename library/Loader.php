<?php

/********************************
 *
 * File Name: Loader.php
 * Description: Module loader
 *
 *******************************/

function LoadModule($module, $params = NULL) {
    
    $matches = array();
    $reason = '';
    
    $ret = preg_match('/^(?P<package>(?:[a-z\\d\\-]+\\.)+)(?P<name>(?P<flag>[lfc]{1})[a-z\\d\\-]+)$/i', $module, $matches);
    
    if ($ret === FALSE) {
        $reason = 'Illegal character in module name.';
        goto errorHandler;
    }
    
    if ($ret === 0) {
        $reason = 'There was an error in the package name you\'ve specified.';
        goto errorHandler;
    }
    
    $package = $matches['package'];
    $name = $matches['name'];
    $flag = $matches['flag'];
    
    $path = LIBRARY_ROOT . str_replace('.', DIRECTORY_SEPARATOR, $package) . $name . '.php';
    
    if (!file_exists($path)) {
        $reason = "Module not found. File path = '$path'.";
        goto errorHandler;
    }
    
    require_once($path);
    switch ($flag) {
        case 'l': case 'L':
            // Load functions from file.
            // Functions are global by default
            // Load only
            return TRUE;
            
        case 'f': case 'F':
            // Load functions from file.
            // Functions are global by default
            // Load and execute
            return $name($params);
            
        case 'c': case 'C':
            // Load classes from file.
            // Must create return an object
            return new $name($params);
    }
    
errorHandler:
    trigger_error("Error loading module '$module'. Reason: $reason.", E_USER_ERROR);
    return FALSE;
}
?>