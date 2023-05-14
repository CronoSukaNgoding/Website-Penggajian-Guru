<?php

namespace App\Controllers;

class GroupMapelController extends BaseController
{
    public function index()
    {
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->groupmapel->getMapel(),
            'menu' => 'mapel',
            'isUri' => $this->request->uri
        ];
        // dd($data);
        return view('backend/mapel/index',$data);
    }
    public function svMapel()
    {
         $data = [
            'kode_mapel' => $this->request->getVar('kode_mapel'),
            'mapel' => $this->request->getVar('mapel'),
        ];
        // dd($data);
        try {
            $update =  $this->groupmapel->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/mapel');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);
    }
     public function deleteMapel($id)
    {
        
         $this->groupmapel->delete($id);
          $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil ditambah');
         return redirect()->to('/mapel');
    }
    
    public function updateMapel($id)
    {
         $data = [
            'mapel_id' => $id,
            'kode_mapel' => $this->request->getVar('kode_mapel'),
            'mapel' => $this->request->getVar('mapel'),
        ];
        // dd($data);
        try {
            $update =  $this->groupmapel->save($data);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil ditambah');
             return redirect()->to('/mapel');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);
    }
      
}