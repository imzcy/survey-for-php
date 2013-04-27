<?php

function FAssertUser($iPrivilege) {
    $currentUser = LoadModule('core.FCurrentUser');
    
    if ($currentUser->isAdministrator()) {
        return;
    }
    
    header('Location', SIGNIN_URL);
}

?>