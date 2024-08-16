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
    $kependudukanModel = new KependudukanModel();

    $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;
    $limit = 50;
    $offset = ($page - 1) * $limit;

    $data['title'] = 'Management Kependudukan';
    $data['data'] = $kependudukanModel->Get($limit, $offset);

    // Calculate total pages
    $totalRecords = $kependudukanModel->countAllResults();
    $data['totalPages'] = ceil($totalRecords / $limit);
    $data['currentPage'] = $page;

    echo view('admin/partials/navbar')
        . view('admin/kependudukan/index', $data)
        . view('admin/partials/sidebar')
        . view('admin/partials/footer');
}


    public function ChartKependudukan()

    {   
        $kependudukanModel = new KependudukanModel();
        $data['title'] = 'Management Kependudukan';
        $data['data'] = $kependudukanModel->chart();
        $data['chartData'] = $this->prepareChartData($data['data']);

        echo view('admin/partials/navbar')
            . view('admin/kependudukan/Grafik/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');

    }

    public function prepareChartData($kependudukan)
    {
        // Inisialisasi data untuk setiap kategori
        $umur = [];
        $rw = [];
        $rt = [];
        $dusun = [];
        $agama = [];
        $jenis_kelamin = [];

        // Contoh pengelompokan data
        foreach ($kependudukan as $penduduk) {
            $umur[] = $penduduk['umur'];
            $rw[] = $penduduk['rw'];
            $rt[] = $penduduk['rt'];
            $dusun[] = $penduduk['dusun'];
            $agama[] = $penduduk['agama'];
            $jenis_kelamin[] = $penduduk['jenis_kelamin'];
        }
        // Lakukan pengolahan untuk menghitung jumlah berdasarkan kategori
        return [
            'umur' => array_count_values($umur),
            'rw' => array_count_values($rw),
            'rt' => array_count_values($rt),
            'dusun' => array_count_values($dusun),
            'agama' => array_count_values($agama),
            'jenis_kelamin' => array_count_values($jenis_kelamin)
        ];
    }

    public function EditData($id)
    {
        $KependudukanModel = new KependudukanModel();
            $desa = $KependudukanModel->find($id);
        if ($desa) {
            $data = [
                        'nama' => $this->request->getPost('nama'),
                        'nik' => $this->request->getPost('nik'),
                        'no_kk' => $this->request->getPost('no_kk'),
                        'nama_ayah' => $this->request->getPost('nama_ayah'),
                        'nama_ibu' => $this->request->getPost('nama_ibu'),
                        'alamat' => $this->request->getPost('alamat'),
                        'dusun' => $this->request->getPost('dusun'),
                        'rw' => $this->request->getPost('rw'),
                        'rt' => $this->request->getPost('rt'),
                        'umur' => $this->request->getPost('umur'),
                        'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];


                $KependudukanModel->update($id, $data);
            return redirect()->to('/dashboard/kependudukan')->with('pesan', 'Data kependudukan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data Kependudukan gagal diperbarui');
        }
    }

        public function HapusData($id)
    {
        $kependudukanModel = new kependudukanModel();

        $data = [
            'id' => $id
        ];
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        $kependudukanModel->HapusData($data);
        return redirect()->to('/dashboard/kependudukan');
    }
}
