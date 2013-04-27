<?php

function FRToken() {
    $token = isset($_COOKIE['rtoken']) ? $_COOKIE['rtoken'] : '';
    
    if (preg_match('/^[a-zA-Z\\d]{' . UUID_LENGTH . '}$/', $token)) {
        $dbh = LoadModule('core.FDatabase');
        
        // Remove expired token
        $dbh->query('DELETE FROM token WHERE level = 1 AND time < UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL -2 HOUR));');
        $stmt = $dbh->prepare('SELECT id FROM token WHERE token = :token AND level = 1;');
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