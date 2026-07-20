<?php

namespace App\Models;

use CodeIgniter\Model;

class VueFraisBareme extends Model
{
    protected $table = 'vue_frais_bareme';

    protected $primaryKey = 'id_tranche';

    protected $returnType = 'array';

    protected $allowedFields = [];
}
