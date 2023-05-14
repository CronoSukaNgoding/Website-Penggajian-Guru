<?php

namespace App\Controllers;

class KelasController extends BaseController
{
    public function index()
    {
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->kelas->getKelas(),
            'menu' => 'kelas',
            'isUri' => $this->request->uri
        ];
        // dd($data);
        return view('backend/kelas/index',$data);
    }

    public function svkelas()
    {
        
        $data = [
            'kd_kelas' => $this->request->getVar('kd_kelas'),
            'nama_kelas' => $this->request->getVar('nama_kelas'),
        ];
        // dd($data);
        try {
            $update = $this->kelas->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/kelas');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);
    }

     public function deleteKelas($id)
    {
        
         $this->kelas->delete($id);
          $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil ditambah');
         return redirect()->to('/kelas');
    }
    
    public function updateKelas($id)
    {
         $data = [
            'kelas_id' => $id,
            'kd_kelas' => $this->request->getVar('kd_kelas'),
            'nama_kelas' => $this->request->getVar('nama_kelas'),
        ];
        // dd($data);
        try {
            $update =  $this->kelas->save($data);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil ditambah');
             return redirect()->to('/kelas');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);
    }
}