<?php

namespace App\Models;

use CodeIgniter\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'libelle'
    ];

    protected $useTimestamps = false;
}