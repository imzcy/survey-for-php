<?php

class CUser {
    private $isUser = '';
    private $isModerator = '';
    private $isAdministrator = '';
    private $id = '';
    private $email = '';
    private $name = '';
    
    function __construct($params) {
        if (isset($params)) {
            if (isset($params['id'])) {
                // Create user by lookup token
                
                $dbh = LoadModule('core.FDatabase');
                
                $stmt = $dbh->prepare('SELECT id, email, name, is_user, is_moderator, is_administrator FROM user WHERE id = :id;');
                $stmt->bindParam(':id', $params['id']);
                
                
                if ($stmt->execute()) {
                    if ($stmt->rowCount() == 1) {
                        $result = $stmt->fetch();
                        
                        $this->isUser = $result['is_user'];
                        $this->isModerator = $result['is_moderator'];
                        $this->isAdministrator = $result['is_administrator'];
                        $this->id = $result['id'];
                        $this->email = $result['email'];
                        $this->name = $result['name'];
                        
                        return;
                    } else {
                        $this->isUser = 0;
                        $this->isModerator = 0;
                        $this->isAdministrator = 0;
                        
                        return;
                    }
                    $this->isUser = 0;
                    $this->isModerator = 0;
                    $this->isAdministrator = 0;
                        
                    return;
                }
                return;
            }
        } else {
            // Return a new user
            
            return;
        }
    }
    
    function isUser() {
        return $this->isUser;
    }
    
    function isModerator() {
        return $this->isModerator;
    }
    
    function isAdministrator() {
        return $this->isAdministrator;
    }
}

?>