<?php

namespace App\Controllers;

class JadwalMengajarController extends BaseController
{
    public function index()
    {
        $cekId = $this->sesi->get('user_id');
        $cekGuru = $this->users->join('group_ajar', 'group_ajar.id_guru = users.user_id')->join('kelas' ,'group_ajar.idkelas = kelas.kelas_id')->join('group_mapel' ,'group_mapel.mapel_id = group_ajar.idmapel')->join('group_gaji','users.role_id = group_gaji.role')->where('id_guru', $cekId)->get()->getResult();
       

        $cekGaji = $this->gaji->select("total_gaji")->where('guru', $cekId)->first();
        // dd($cekGaji);

        
        
        
        $data =[
            //wajib
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'menu' => 'Jadwal Mengajar',
            'isUri' => $this->request->uri,
            'result' => $cekGuru,
            'gaji' =>$cekGaji
            

        ];
        // dd($data);
        return view('backend/guru/jadwalmengajar',$data);
    
}

    
}