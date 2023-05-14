<?php

namespace App\Controllers;

class DataAjarController extends BaseController
{
    public function index()
    {
        $cekAjar =  $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        
        
        //kelas 1
        $cekSenin = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Senin')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        $cekSelasa = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Selasa')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        $cekRabu = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Rabu')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        $cekKamis = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Kamis')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        $cekJumat = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Jumat')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        $cekSabtu = $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('hari','Sabtu')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        // dd($cekKamis);
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $cekAjar,
            'menu' => 'Data Ajar',
            'isUri' => $this->request->uri,
            'senin' => $cekSenin,
            'selasa' => $cekSelasa,
            'rabu' => $cekRabu,
            'kamis' => $cekKamis,
            'jumat' => $cekJumat,
            'sabtu' => $cekSabtu,
        ];
        // dd($data);
        return view('backend/mengajar/index',$data);
    }

    public function tambahajar(){ 
       $cekguru = $this->users->where('role_id','2')->get()->getResult();
       $cekmapel = $this->groupmapel->getMapel();
       $cekkelas = $this->kelas->getKelas();
    //    dd($cekkelas);
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->ajar->getAjar(),
            'menu' => 'Data Ajar',
            'cekguru' => $cekguru,
            'cekmapel' => $cekmapel,
            'cekkelas' => $cekkelas,
            'isUri' => $this->request->uri
        ];
        // dd($data);
        return view('backend/mengajar/tambahajar',$data);
    }
    public function svtambahajar(){
        $cekguru = $this->users->where('role_id','2')->get()->getResult();
        $cekmapel = $this->groupmapel->getMapel();
        $cekkelas = $this->kelas->getKelas();
            $data = [
                
                'kode_pelajaran' => $this->request->getVar('kode'),
                'hari' => $this->request->getVar('hari'),
                'waktu_mulai' => $this->request->getVar('waktu-mulai'),
                'waktu_selesai' => $this->request->getVar('waktu-selesai'),
                'jam_kerja' => $this->request->getVar('jamke'),
                'id_guru' => $this->request->getVar('guru'),
                'idmapel' => $this->request->getVar('mapel'),
                'idkelas' => $this->request->getVar('kelas'),
            ];
            // dd($data);
        try {
            $update = $this->ajar->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/ajar');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/mengajar/tambahajar', $data);
    }
    
            
    public function editajar($id){
        $cekguru = $this->users->where('role_id','2')->get()->getResult();
        $cekmapel = $this->groupmapel->getMapel();
        $cekkelas = $this->kelas->getKelas();
        $cekajar = $cekGuru = $this->users->join('group_ajar', 'group_ajar.id_guru = users.user_id')->join('kelas' ,'group_ajar.idkelas = kelas.kelas_id')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->where('ajar_id', $id)->get()->getResult();
        
        $data = [
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->ajar->getAjar(),
            'menu' => 'Data Ajar',
            'cekguru' => $cekguru,
            'cekmapel' => $cekmapel,
            'cekkelas' => $cekkelas,
            'isUri' => $this->request->uri,
            'result' => $cekajar,
        ];
        // dd($data);
        
        return view('backend/mengajar/editajar', $data);
    }
    public function updateajar($id){
        $cekguru = $this->users->where('role_id','2')->get()->getResult();
        $cekmapel = $this->groupmapel->getMapel();
        $cekkelas = $this->kelas->getKelas();
            $data = [
                'ajar_id' => $id,
                'kode_pelajaran' => $this->request->getVar('kode'),
                'hari' => $this->request->getVar('hari'),
                'waktu_mulai' => $this->request->getVar('waktu-mulai'),
                'waktu_selesai' => $this->request->getVar('waktu-selesai'),
                'jam_kerja' => $this->request->getVar('jamke'),
                'id_guru' => $this->request->getVar('guru'),
                'idmapel' => $this->request->getVar('mapel'),
                'idkelas' => $this->request->getVar('kelas'),
            ];
            // dd($data);
        try {
            $update = $this->ajar->save($data);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil ditambah');
             return redirect()->to('/ajar');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/mengajar/editajar', $data);
    }

    public function deleteajar($id){
            $this->ajar->delete($id);
          $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil ditambah');
         return redirect()->to('/ajar');
    }

    public function deleterowajar(){
       
        $ajar_id = $this->request->getVar('ajar_id'); // Ambil data ajar_id dari form

        // Jika checkbox "Pilih Semua" dipilih
        if ($this->request->getVar('check_all')) {
            $ajar = $this->ajar->getAjar(); // Ambil seluruh data pada tabel
            $ajar_id = array(); // Set ajar_id menjadi array kosong

            // Looping untuk mengisi ajar_id dengan ajar_id dari seluruh data pada tabel
            foreach ($ajar as $row) {
                $ajar_id[] = $row->ajar_id;
            }
        }
        // dd($ajar_id);
        try {
            $data['group_ajar'] = $this->ajar->find($ajar_id); // Ambil data pada tabel berdasarkan ajar_id yang dipilih
            
             // dd($data);
            $delete= $this->ajar->delete($ajar_id); // Hapus data pada tabel group_ajar berdasarkan ajar_id yang dipilih
            $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil dihapus');
            return redirect()->to('/ajar');
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }




    
}