<?php 

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    public function verifyPassword($password)
    {    
        return password_verify($password, $this->password_hash);
    }
    
    public function startActivation()
    {
        $this->token = bin2hex(random_bytes(16));
        
        $this->activation_hash = hash_hmac('sha256', $this->token, $_ENV['HASH_SECRET_KEY']);
    }
    
    public function activate()
    {
        $this->is_active = true;
        $this->activation_hash = null;
    }
    
    public function startPasswordReset()
    {
        $this->token = bin2hex(random_bytes(16));
        
        $this->reset_hash = hash_hmac('sha256', $this->token, $_ENV['HASH_SECRET_KEY']);
        
        $this->reset_expires_at = date('Y-m-d H:i:s', time() + 7200);
    }
    
    public function completePasswordReset()
    {
        $this->reset_hash = null;
        $this->reset_expires_at = null;
    }
}