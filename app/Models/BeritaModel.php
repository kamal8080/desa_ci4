<?php

namespace App\Models;

use CodeIgniter\Model;


class BeritaModel extends Model
{
    protected $primaryKey = 'id_berita';
    protected $table = 'berita';
    protected $allowedFields = ['id_berita', 'judul_berita', 'slug_berita', 'isi_berita', 'gambar'];

    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

     public function TambahData($data)
    {
        return $this->insert($data);
    }
    
    public function EditData($id_berita, $data)
    {
        return $this->update($id_berita, $data);
    }
    public function HapusData($data)
    {
        return $this->db->table($this->table)
            ->where('id_berita', $data['id_berita'])
            ->delete($data);
    }

}