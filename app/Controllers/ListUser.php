<?php 

namespace App\Controllers;

use App\Models\ListUserModel;

class ListUser extends BaseController
{
    public function index()
    {
        $ListUserModel = new ListUserModel();
        $data['title'] = 'Management Profil';
        $data['data'] = $ListUserModel->Get();

        echo view('admin/partials/navbar')
            . view('admin/User/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }

	public function EditData($id)
    {
		$ListUserModel = new ListUserModel();
        $user = $ListUserModel->find($id);
    
        if ($user) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'level' => $this->request->getPost('level'),
			];
            $ListUserModel->update($id, $data);
            return redirect()->to('/dashboard/user')->with('pesan', 'Data user berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data user tidak ditemukan');
        }
    }	
}