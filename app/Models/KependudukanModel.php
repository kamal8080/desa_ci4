<?php

namespace App\Models;

use CodeIgniter\Model;

class KependudukanModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'penduduk';
    protected $allowedFields = ['jumlah_penduduk','laki_laki','perempuan','jumlah_kepala_keluarga','jumlah_rt','jumlah_rw','jumlah_sekolah','jumlah_puskesmas','jumlah_balaidesa','jumlah_tempat_ibadah','jumlah_pasar_desa'];


    public function Get()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function EditData($id, $data)
    {
            return $this->update($id, $data);
    }


}