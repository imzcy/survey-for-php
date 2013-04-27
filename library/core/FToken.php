<?php

function FToken() {
    $token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';
    
    if (preg_match('/^[a-zA-Z\\d]{' . UUID_LENGTH . '}$/', $token)) {
        $dbh = LoadModule('core.FDatabase');
        
        $stmt = $dbh->prepare('SELECT id FROM token WHERE token = :token AND level = 0;');
        $stmt->bindParam(':token', $token);
        
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $result = $stmt->fetch();
                return $result['id'];
            } else {
                return -1;
            }
            return -1;
        }
    } else {
        return -1;
    }
}

?>