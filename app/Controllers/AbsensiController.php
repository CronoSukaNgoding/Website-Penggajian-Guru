<?php

namespace App\Controllers;



class AbsensiController extends BaseController
{
    public function index()
    {
       $cekguru = $this->users->where('role_id','2')->get()->getResult();
        $data = [
            'menu' => 'Absensi Guru',
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'isUri' => $this->request->uri,
            'result' => $this->absenguru->select("*, absensi_guru.created_at as tglbuat")->join('users', 'users.user_id = absensi_guru.guru')->orderBy('absensi_guru.created_at', 'DESC')->get()->getResult(),
            'namaguru' => $cekguru,
        ];
        // dd($data);

        return view('backend/absen/index', $data);
    }

    public function saveAbsen()
    {
 

        $data = [
            'guru' => $this->request->getVar('guru'),
            'tanggal_absensi' => $this->request->getVar('tanggal_absensi'),
            'absen_hari' => $this->request->getVar('hari'),
            'status' => $this->request->getVar('status'),
            'jam_masuk_ngajar' => $this->request->getVar('waktu-mulai'),
            'jam_keluar_ngajar' => $this->request->getVar('waktu-selesai'),
            'total_jam'=> $this->request->getVar('jamke')
        ];
        // dd($data);
        try {
            $update = $this->absenguru->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/absensi');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);

    
     
    }


    public function updateAbsen($absen_id)
    {
        
        $data = [
            'absen_id' => $absen_id,
            'guru' => $this->request->getVar('guru'),
            'tanggal_absensi' => $this->request->getVar('tanggal_absensi'),
            'absen_hari' => $this->request->getVar('hari'),
            'status' => $this->request->getVar('status'),
            'jam_masuk_ngajar' => $this->request->getVar('waktu-mulai'),
            'jam_keluar_ngajar' => $this->request->getVar('waktu-selesai'),
            'total_jam'=> $this->request->getVar('jamke')
        ];
        // dd($data);
        try {
            $update = $this->absenguru->save($data);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil diupdate');
             return redirect()->to('/absensi');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('backend/absen/index', $data);

    
     
    }

    


    public function deleteAbsen($id)
    {
 

        $this->absenguru->delete($id);

         return redirect()->to('/absensi');
    }
    
    public function deleterowabsen(){
       
        $absen_id = $this->request->getVar('absen_id'); // Ambil data absen_id dari form

        // Jika checkbox "Pilih Semua" dipilih
        if ($this->request->getVar('check_all')) {
            $absen = $this->absenguru->GetAbsensi(); // Ambil seluruh data pada tabel
            $absen_id = array(); // Set absen_id menjadi array kosong

            // Looping untuk mengisi absen_id dengan absen_id dari seluruh data pada tabel
            foreach ($absen as $row) {
                $absen_id[] = $row->absen_id;
            }
        }
        // dd($absen_id);
        try {
            $data['absen_guru'] = $this->absenguru->find($absen_id); // Ambil data pada tabel berdasarkan absen_id yang dipilih
            
            //  dd($data);
            $delete= $this->absenguru->delete($absen_id); // Hapus data pada tabel group_absen berdasarkan absen_id yang dipilih
            $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil dihapus');
            return redirect()->to('/absensi');
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }
}
