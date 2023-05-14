<?php

namespace App\Models;

use CodeIgniter\Model;


class DataAjarModel extends Model
{
    protected $table      = 'group_ajar';
    protected $primaryKey = 'ajar_id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'ajar_id',
        'kode_pelajaran',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
        'jam_kerja',
        'id_guru',
        'idmapel',
        'idkelas'
    ];
     protected $useTimestamps = true;



    public function getAjar($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['ajar_id' => $id])->first();
    }
    

}