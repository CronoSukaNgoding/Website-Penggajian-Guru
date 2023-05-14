<?php

namespace App\Controllers;

class ProfilController extends BaseController
{
    public function index($id)
    {
        $cekData = $this->usersprofil->where('userid', $id)->first();
        if(empty($cekData)){
            $data=[
            'menu' => 'editprofile',
            'isUri' => $this->request->uri,
            'result' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
            'user' => $this->users->where('user_id',$this->sesi->get('user_id'))->first()
        ];
        return view('backend/profil/profilAddoption',$data);
        }else{
        $getProfil = $this->usersprofil->where('userid', $id)->join('users', 'users.user_id = profile.userid')->first();
        // dd($getProfil);
            $data=[
                'menu' => 'editprofile',
                'isUri' => $this->request->uri,
                'result' => $getProfil,
                'user' => $this->users->where('user_id',$this->sesi->get('user_id'))->first()
            ];
        return view('backend/profil/profil',$data);
        }


    }

    public function settingProfil($id)
    {
        $cekUser = $this->users->where('user_id', $id)->first();
        $dataUser = [
            'user_id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            
        ];
        try {
            $this->users->save($dataUser); 
            $cekData = $this->usersprofil->where('userid', $id)->first();
            if(!empty($cekData)){
                $dataProfile = [
                    'id' => $cekData->id,
                    'alamat' => $this->request->getVar('alamat'),
                    'nuptk' => $this->request->getVar('nuptk'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'nohp' => $this->request->getVar('nohp'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'userid' => $id
                ];
                $this->usersprofil->save($dataProfile);
                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/dashboard');
            }else{
                $dataProfile = [
                    'alamat' => $this->request->getVar('alamat'),
                    'nuptk' => $this->request->getVar('nuptk'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'nohp' => $this->request->getVar('nohp'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'userid' => $id
                ];
                $this->usersprofil->save($dataProfile);
                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/dashboard');
            }  
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
