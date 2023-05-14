<?php

namespace App\Controllers;

class UserManageController extends BaseController
{
    public function index()
    {
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->users->GetUsers(),
            'menu' => 'usermanagement',
            'isUri' => $this->request->uri
        ];
        // dd($data);
        return view('backend/karyawan/index',$data);
    }
    public function updateUser($id)
    {
        $data = [
            'user_id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'role_id' => $this->request->getVar('role_id'),
        ];
        // dd($data);
        try {
            $update = $this->users->save($data);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil diubah');
             return redirect()->to('/user-management');
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }
    public function delUser($id)
    {
        $this->users->delete($id);
        $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil dihapus');
        return redirect()->to('/user-management');
    }
}
