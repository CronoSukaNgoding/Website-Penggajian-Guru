<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersProfilModel extends Model{
    protected $table      = 'profile';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
	
    protected $useTimestamps = true;
    
    protected $allowedFields = 
    ['id','userid','nuptk','tempat_lahir','alamat','nohp','tgl_lahir','pendidikan_akhir','jenis_kelamin'];
    
    public function GetUsersProfil($id =false) 
    {
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }


}