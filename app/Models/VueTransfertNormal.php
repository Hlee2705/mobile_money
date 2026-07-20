<?php

namespace App\Models;

use CodeIgniter\Model;

class VueTransfertNormal extends Model
{
    protected $table = 'vue_transfert_normal';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'numero_emetteur',
        'numero_receveur',
        'montant',
        'frais',
        'commission',
        'date_operation'
    ];

    protected $useTimestamps = false;
}