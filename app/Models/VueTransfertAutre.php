<?php

namespace App\Models;

use CodeIgniter\Model;

class VueTransfertAutre extends Model
{
    protected $table = 'vue_transfert_autre';
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