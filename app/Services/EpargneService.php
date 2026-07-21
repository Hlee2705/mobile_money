<?php

namespace App\Services;

use App\Models\Epargne;

class EpargneService{
    protected Epargne $epargneModel;

    public function __construct()
    {
        $this->epargneModel = new Epargne();
    }

    public function findAll(): array
    {
        return $this->epargneModel->findAll();
    }

    // public function calculerEpargne(int $idUtilisateur, float $pourcentageEpargne, $){

    // }
}