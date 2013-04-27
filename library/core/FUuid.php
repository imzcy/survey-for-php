<?php

function FUuid() {
    $len = UUID_LENGTH;
    $chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; $l = 61;
    
    $str = '';
    while ($len-- > 0) {
        $str .= $chars{mt_rand(0, $l)};
    }
    
    return $str;
}

?>