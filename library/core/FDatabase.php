<?php

function FDatabase() {
    global $_Database;
    echo isset($_Database);
    if (!isset($_Database)) {
        // Setup new connection
        $_Database = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME, MYSQL_USER, MYSQL_PASS);
        $_Database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    
    return $_Database;
}

?>