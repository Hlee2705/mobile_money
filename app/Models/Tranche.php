<?php

namespace App\Models;

use CodeIgniter\Model;

class Tranche extends Model
{
    protected $table = 'tranche';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'min',
        'max'
    ];

    protected $useTimestamps = false;
}