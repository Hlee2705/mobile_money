<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'numero',
        'id_role'
    ];

    protected $useTimestamps = false;
}