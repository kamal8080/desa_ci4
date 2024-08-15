<?php

namespace App\Controllers;
use App\Models\KependudukanModel;
use App\Models\KontakModel;

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\Validation;

class Kependudukan extends BaseController
{   
    protected $KependudukanModel;
    protected $validation;
    protected $kontakModel;

    public function __construct()

    {
        helper(['url', 'form']);
        $this->KependudukanModel = new KependudukanModel();
        $this->kontakModel = new KontakModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {   
        $kependudukanModel = new KependudukanModel();
        $kependudukan['kependudukan'] = $kependudukanModel->Get();
        $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        return view('partials/header')
            . view('KependudukanDanFasilitasDesa', $kependudukan)
            . view('partials/footer', $kontak);

    }

    public function AdminKependudukan()
    {
        $KependudukanModel = new KependudukanModel();
        $data['title'] = 'Management Kependudukan';
        $data['data'] = $KependudukanModel->Get();
        echo view('admin/partials/navbar')
            . view('admin/kependudukan/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }

    public function EditData($id)
    {
        $KependudukanModel = new KependudukanModel();
            $desa = $KependudukanModel->find($id);
        if ($desa) {
            $data = [
                'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk'),
                'laki_laki' => $this->request->getPost('laki_laki'),
                'perempuan' => $this->request->getPost('perempuan'),
                'jumlah_kepala_keluarga' => $this->request->getPost('jumlah_kepala_keluarga'),
                'jumlah_rt' => $this->request->getPost('jumlah_rt'),
                'jumlah_rw' => $this->request->getPost('jumlah_rw'),
                'jumlah_sekolah' => $this->request->getPost('jumlah_sekolah'),
                'jumlah_puskesmas' => $this->request->getPost('jumlah_puskesmas'),
                'jumlah_balaidesa' => $this->request->getPost('jumlah_balaidesa'),
                'jumlah_tempat_ibadah' => $this->request->getPost('jumlah_tempat_ibadah'),
                'jumlah_pasar_desa' => $this->request->getPost('jumlah_pasar_desa')
            ];
                $KependudukanModel->update($id, $data);
            return redirect()->to('/dashboard/kependudukan')->with('pesan', 'Data kependudukan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data Kependudukan gagal diperbarui');
        }
    }
}

