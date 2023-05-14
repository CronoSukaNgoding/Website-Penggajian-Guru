<?php

namespace App\Controllers;

class DaftarController extends BaseController
{
    public function index()
    {
        
        $data = [
            'validation' => $this->valid
        ];
        return view('backend/auth/register',$data);
    }

    public function Register(){
         $isValid = [
            'fullname' => 'required',
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
       ];
       
       if (!$this->validate($isValid)) {
           return redirect()->to('/register')->withInput()->with('validation', '');
       }
        
       $data = [
           'fullname' => $this->request->getVar('fullname'),
           'username' => $this->request->getVar('username'),
           'email' => $this->request->getVar('email'),
           'password' => \password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
           'role_id' => 2,
           'avatar' => 'default-avatar.jpg'
       ];
    // dd($data);
       try {
            $daftar = $this->users->save($data);
            $this->sesi->setFlashdata('sukses', 'Selamat anda berhasil mendaftar');
            return redirect()->to('/masuk');
       } catch (\Exception $e) {
        $e->getMessage();
       }
   }
}