<?php

namespace App\Models;

class ListUserModel extends \CodeIgniter\Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password','level'];

    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function EditData($id, $data)
    {
            return $this->update($id, $data);
    }

}
