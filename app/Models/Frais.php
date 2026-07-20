<?php

namespace App\Models;

use CodeIgniter\Model;

class Frais extends Model
{
    protected $table = 'frais';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'valeur',
        'id_tranche',
        'id_type_operation'
    ];

    protected $useTimestamps = false;
}