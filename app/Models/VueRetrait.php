<?php

namespace App\Models;

use CodeIgniter\Model;

class VueRetrait extends Model
{
    protected $table = 'vue_retrait';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'numero_emetteur',
        'montant',
        'frais',
        'date_operation'
    ];

    protected $useTimestamps = false;
}