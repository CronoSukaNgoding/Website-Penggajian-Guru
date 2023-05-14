<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiGuruModel extends Model
{
    protected $table = 'absensi_guru';
    protected $primaryKey = 'absen_id';
    protected $returnType = 'object';
    protected $allowedFields = ['absen_id','guru', 'absen_hari','tanggal_absensi', 'jam_masuk_ngajar','jam_keluar_ngajar','total_jam','status'];


    protected $useTimestamps = true;

    public function GetAbsensi($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['absen_id' => $id])->first();
    }
}