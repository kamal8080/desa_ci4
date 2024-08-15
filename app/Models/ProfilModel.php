<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'desa_profiles';
    protected $allowedFields = ['id','nama_desa','tentang_desa','visi','misi','gambar_desa'];


    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function EditData($id, $data)
    {
            return $this->update($id, $data);
    }


}