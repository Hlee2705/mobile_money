<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriqueTransaction extends Model
{
    protected $table = 'historique_transaction';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'numero_receveur',
        'id_type_operation',
        'montant',
        'frais'
    ];

    protected $useTimestamps = false;
}