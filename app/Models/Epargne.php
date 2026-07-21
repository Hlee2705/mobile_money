<?php

namespace App\Models;

use CodeIgniter\Model;

class Epargne extends Model
{
    protected $table = 'epargne';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'valeur_epargne',
        'id_utilisateur'
    ];

    protected $useTimestamps = false;
}