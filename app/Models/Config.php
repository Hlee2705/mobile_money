<?php

namespace App\Models;

use CodeIgniter\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'valeur',
        'date_insertion'
    ];
}