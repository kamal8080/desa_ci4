<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'kontak';
    protected $allowedFields = ['alamat','telepon','email','lokasi_map'];


    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }
    public function EditData($id, $data)
    {
            return $this->update($id, $data);
    }


}