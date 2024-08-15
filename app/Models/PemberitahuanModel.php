<?php

namespace App\Models;
use CodeIgniter\Model;

class PemberitahuanModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pemberitahuan';
    protected $allowedFields = ['id', 'judul', 'slug','isi'];

    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function TambahData($data)
    {
        return $this->insert($data);
    }

    public function HapusData($data)
    {
        return $this->db->table($this->table)
            ->where('id', $data['id'])
            ->delete($data);
    }

    public function EditData($id, $data)
    {
        return $this->update($id, $data);
    }

}