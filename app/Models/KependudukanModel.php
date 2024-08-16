<?php

namespace App\Models;

use CodeIgniter\Model;

class KependudukanModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'penduduk';
    protected $allowedFields = [
        'nama', 'nik', 'no_kk', 'nama_ayah', 'nama_ibu', 'alamat',
        'dusun', 'rw', 'rt', 'umur', 'pekerjaan'
    ];

    
    public function Get($limit = 50, $offset = 0)
{
    return $this->db->table($this->table)
                    ->limit($limit, $offset)
                    ->get()
                    ->getResultArray();
}

    public function Chart()
{
    return $this->db->table($this->table)
                    ->get()
                    ->getResultArray();
}
    public function EditData($id, $data)
    {
            return $this->update($id, $data);
    }
    
    public function HapusData($data)
    {
        return $this->db->table($this->table)
        ->where('id', $data['id'])
        ->delete($data);
    }
}