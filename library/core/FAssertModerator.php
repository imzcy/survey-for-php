<?php

function FAssertUser($iPrivilege) {
    $currentUser = LoadModule('core.FCurrentUser');
    
    if ($currentUser->isModerator()) {
        return;
    }
    
    header('Location', SITE_URL . SIGNIN_URL);
}

?>