<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupRoleModel extends Model
{
    protected $table      = 'grouprole';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = ['id', 'role',];
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

}