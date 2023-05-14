<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'gaji_guru'; // Nama tabel gaji pada database
    protected $primaryKey = 'gaji_id'; // Nama kolom primary key pada tabel gaji
    protected $allowedFields = ['guru', 'jam_kerja', 'total_gaji']; // Kolom yang diizinkan untuk diisi

    
    protected $useTimestamps = true;

    
    public function getGaji($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['gaji_id' => $id])->first();
    }
    
}



    