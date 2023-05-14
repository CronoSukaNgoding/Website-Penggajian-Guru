<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $cekguru = $this->users->where('role_id','2')->get()->getResult();
        $cekAdmin = $this->users->where('role_id','1')->get()->getResult();
        
        // dd($cekAdmin);
        $data =[
            //wajib ada disetiap controller
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'jmlguru' => count($cekguru),
            'jmlAdmin' => count($cekAdmin) ,
            'menu' => 'dashboard',
            'isUri' => $this->request->uri
        ];
        // dd($data);
        return view('backend/index',$data);
    }
}
