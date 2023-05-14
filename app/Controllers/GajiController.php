<?php

namespace App\Controllers;

use App\Models\GajiModel;

class GajiController extends BaseController
{
   
    public function index()
    {
       
        // Ambil data guru
        $cekguru = $this->users->where('role_id','2')->join('group_ajar', 'group_ajar.id_guru = users.user_id')->join('kelas' ,'group_ajar.idkelas = kelas.kelas_id')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('group_gaji','users.role_id = group_gaji.role')->orderBy('group_ajar.created_at', 'DESC')->groupby('group_ajar.id_guru')->get()->getResult();
        //    dd($cekguru);

        

        // Tampilkan hasil
        $data =[
            'guru' => $cekguru,
            'menu' => 'Absensi Guru',
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'isUri' => $this->request->uri,
        ];
        // dd($data);

        return view ('backend/gaji/index',$data);
    }

    public function lihatgaji($id_guru){
       
        $cekGuru = $this->users->join('group_ajar', 'group_ajar.id_guru = users.user_id')->join('kelas' ,'group_ajar.idkelas = kelas.kelas_id')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('group_gaji','users.role_id = group_gaji.role')->join('gaji_guru','group_ajar.id_guru = gaji_guru.guru')->where('id_guru', $id_guru)->groupby('users.created_at')->get()->getResult();
        $cekAjar =  $this->ajar->select("*, group_ajar.created_at as tglbuat")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->orderBy('group_ajar.created_at', 'DESC')->get()->getResult();
        
        // dd($cekGuru);

        $cekdulu = $this->users->join('group_ajar', 'group_ajar.id_guru = users.user_id')->join('kelas' ,'group_ajar.idkelas = kelas.kelas_id')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('group_gaji','users.role_id = group_gaji.role')->where('id_guru', $id_guru)->groupby('users.created_at')->get()->getResult();

        $cekGaji = $this->gaji->select("*")->where('guru', $id_guru)->first();

        // Ambil data absen
        $cekAbsen = $this->absenguru->select("*, absensi_guru.created_at as tglbuat")->join('users', 'users.user_id = absensi_guru.guru')->where('user_id', $id_guru)->orderBy('absensi_guru.created_at', 'DESC')->get()->getResult();
        $cekjmlAjar =  $this->ajar->selectCount("*")->join('users', 'users.user_id = group_ajar.id_guru')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('kelas','kelas.kelas_id = group_ajar.idkelas')->where('id_guru', $id_guru)->orderBy('group_ajar.created_at', 'DESC')->countAllResults();
      
        $jumlahAbsen =$this->absenguru->select("*, absensi_guru.created_at as tglbuat")->join('users', 'users.user_id = absensi_guru.guru')->join('group_ajar','group_ajar.id_guru = absensi_guru.guru')->where('user_id', $id_guru )->where('status','hadir')->where('absensi_guru.absen_hari = group_ajar.hari')->orderBy('absensi_guru.created_at', 'DESC')->groupby('absensi_guru.created_at')->get()->getResult();

        


        // Hitung gaji guru
        foreach ($cekGuru as $g) {
            $totalJam = 0;
            //cek data ajar setiap guru
            foreach ($cekAjar as $a) {
                if ($g->user_id == $a->id_guru) {
                    //total semua Jam ngajar
                    $totalJam += ($a->jam_kerja);
                    // dd($g);
                }
            }
            
            $g->total_jam2 = $totalJam;
            $g->total_gaji_absen = count($jumlahAbsen) * $g->gaji_absen;
            $totalgajiAbsen = $g->total_gaji_absen;
            $total_jam_kerja = 0;
            

            foreach ($jumlahAbsen as $absen) {
               
                $total_jam_kerja += ($absen->total_jam);
               
            }

            // $hasil = ($g->user_id == $absen->guru) and ($g->hari == $absen->absen_hari);
           
            $g->total_gaji = 0;
            
            //ketika jumlahnya sudah sama dan tidak null
            
            if(count($jumlahAbsen) != null and count($jumlahAbsen) == $cekjmlAjar){
                $g->total_gaji += ($totalJam * $g->gaji_perjam)+ $totalgajiAbsen; 
            }else{ //ketika jumlahnya kurang atau berbeda
                $g->total_gaji += ($total_jam_kerja * $g->gaji_perjam)+ $totalgajiAbsen;
            }
            
            $totalGaji = $g->total_gaji;
             
        }
        
        
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'menu' => 'Jadwal Mengajar',
            'isUri' => $this->request->uri,
            'guru' => $cekGuru,
            'gaji  ' => $totalGaji,
            'cekAbsen' => $cekAbsen,
            'jumlah mapel yg di ajar' =>  $cekjmlAjar,
            'total jam yang harus di ajar' => $totalJam,
            'jumlah Absen' => $jumlahAbsen,
            'gaji saat absen' => $totalgajiAbsen,
            'jam ajar sekarang' =>$total_jam_kerja,
            'ini cek gaji' => $cekGaji,
            // 'hasil' => $hasil
        ];
        // dd($data);
        return view('backend/gaji/detail',$data);

    }

    public function buatGaji($id_guru)
    {   
        $cekGaji = $this->gaji->where('guru', $id_guru)->first();
        try {
                $data =[
                    'gaji_id' =>$this->request->getVar('gaji_id'),
                    'guru'=> $this->request->getVar('fullname'), 
                    'jam_kerja'=> $this->request->getVar('jabatan'),
                    'total_gaji'=> $this->request->getVar('total_gaji'),
                ];
                // dd($data);
                $save = $this->gaji->save($data);
                $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah ');
                return redirect()->to('/gaji');
  
        }
       
        catch (\Exception $e) {
         $e->getMessage();
        }
        
        
        return view ('backend/gaji/index',$data);
    }

    public function svGaji($id_guru)
    {   
        $cekGaji = $this->gaji->where('guru', $id_guru)->first();
        try {
            if(!empty($cekGaji)){
                $data =[
                    'gaji_id' =>$this->request->getVar('gaji_id'),
                    'guru'=> $this->request->getVar('fullname'), 
                    'jam_kerja'=> $this->request->getVar('jabatan'),
                    'total_gaji'=> $this->request->getVar('total_gaji'),
                ];
                $save = $this->gaji->save($data);
                $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah ');
                return redirect()->to('/gaji');
            }else{
                $data =[
                    'gaji_id' =>$this->request->getVar('gaji_id'),
                    'guru'=> $this->request->getVar('fullname'), 
                    'jam_kerja'=> $this->request->getVar('jabatan'),
                    'total_gaji'=> $this->request->getVar('total_gaji'),
                ];
            }
        }
       
        catch (\Exception $e) {
         $e->getMessage();
        }
        
        
        return view ('backend/gaji/index',$data);
    }
    


}
