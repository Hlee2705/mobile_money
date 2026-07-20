<?php

namespace App\Models;

use CodeIgniter\Model;

class Compte extends Model
{
    protected $table = 'compte';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'solde'
    ];

    protected $useTimestamps = false;
}