<?php

function FAssertUser($iPrivilege) {
    $currentUser = LoadModule('core.FCurrentUser');
    
    if ($currentUser->isUser()) {
        echo 'is a user';
        return;
    }
    
    header('Location: ' . SIGNIN_URL);
}

?>