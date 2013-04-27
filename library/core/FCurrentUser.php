<?php

function FCurrentUser() {
    global $_CurrentUser;

    if (isset($_CurrentUser)) {
        return $_CurrentUser;
    }
    
    $_CurrentUser = LoadModule('core.CUser', array('id' => LoadModule('core.FToken')));
    return $_CurrentUser;
}

?>