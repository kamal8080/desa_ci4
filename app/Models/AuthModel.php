<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';

        public function save_register($data)
    {
        $query = $this->db->table('users')->insert($data);
        return $query;
    }

    public function login($email, $password)
    {
        $query = $this->db->table('users')->getWhere(['email' => $email]);
        $user = $query->getRowArray();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

        public function checkEmailExists($email)
    {
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $query = $builder->get();
        return $query->getRowArray();
    }

}