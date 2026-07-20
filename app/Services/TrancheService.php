<?php

namespace App\Services;

use App\Models\Tranche;

class TrancheService
{
    protected Tranche $trancheModel;

    public function __construct()
    {
        $this->trancheModel = new Tranche();
    }

    /**
     * Retourne toutes les tranches triées par montant minimum.
     */
    public function findAll(): array
    {
        return $this->trancheModel
            ->orderBy('min', 'ASC')
            ->findAll();
    }
}