<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';

    public function login($email, $password)
    {
        $query = $this->db->table('users')->getWhere(['email' => $email]);
        $user = $query->getRowArray();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}