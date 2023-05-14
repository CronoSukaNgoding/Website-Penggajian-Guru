<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function Login()
    {
        
        if($this->sesi->get('logged_in') == true){
            return redirect()->to('/');
        }else{
            //  $data = [
            //     'validation' => $this->valid
            // ];
            return view('backend/auth/login');
        }
        
       
    }
    public function cekLogin(){
        $isValid = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ];
        if (!$this->validate($isValid)) {
            return redirect()->to('/masuk')->withInput()->with('validation', '');
        }
       
        $user = $this->users->where("username", $this->request->getVar("username"))->first();
        

        if (!$user) {
            $this->sesi->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/masuk');
        }else{
            $password = $this->request->getVar("password");
            // dd($password);
            $hash = $user->password;
            // dd($hash);
            $cekPw = password_verify($password, $hash);
            // dd($cekPw);
            if(!$cekPw){
                $this->sesi->setFlashdata('error', 'Password salah');
                return redirect()->to('/masuk');
            }else {
                $ses_data = [
                    'user_id' => $user->user_id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'logged_in' => true,
                    'role' => $user->role_id,
                    'avatar' => $user->avatar
                ];
                // dd($ses_data);
                $this->sesi->set($ses_data);
                $this->sesi->setFlashdata('sukses', 'Selamat Datang');
                return redirect()->to('/dashboard');
            }
        }
    }
     public function Logout(){
        $this->sesi->destroy();
        return redirect()->to('/masuk');
    }
}
