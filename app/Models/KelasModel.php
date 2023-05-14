<?php

namespace App\Models;

use CodeIgniter\Model;


class KelasModel extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'kelas_id',
        'kd_kelas',
        'nama_kelas',
    ];



    public function GetKelas($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['kelas_id' => $id])->first();
    }
    

}