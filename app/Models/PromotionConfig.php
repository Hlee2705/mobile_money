<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionConfig extends Model
{
    protected $table = 'promotion_config';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'valeur'
    ];
}