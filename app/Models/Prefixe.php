<?php

namespace App\Models;

use CodeIgniter\Model;

class Prefixe extends Model
{
    protected $table = 'prefixe';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'code',
        'type_prefixe'
    ];

    protected $useTimestamps = false;
}