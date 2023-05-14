<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupMapelModel extends Model
{
    protected $table = 'group_mapel';
    protected $primaryKey = 'mapel_id';
    protected $returnType = 'object';
    protected $allowedFields = ['mapel_id','kode_mapel', 'mapel'];



    public function GetMapel($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['mapel_id' => $id])->first();
    }
}