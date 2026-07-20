<?php

namespace App\Services;

use App\Models\VueTransfertNormal;
use App\Models\VueTransfertAutre;
use App\Models\VueRetrait;

class HistoriqueTransactionService
{
    protected VueTransfertNormal $vueTransfertNormal;
    protected VueTransfertAutre $vueTransfertAutre;
    protected VueRetrait $vueRetrait;

    public function __construct()
    {
        $this->vueTransfertNormal = new VueTransfertNormal();
        $this->vueTransfertAutre = new VueTransfertAutre();
        $this->vueRetrait = new VueRetrait();
    }

    public function listerTransfertsNormaux()
    {
        return $this->vueTransfertNormal
            ->orderBy('date_operation', 'DESC')
            ->findAll();
    }

    public function listerTransfertsAutres()
    {
        return $this->vueTransfertAutre
            ->orderBy('date_operation', 'DESC')
            ->findAll();
    }

    public function listerRetraits()
    {
        return $this->vueRetrait
            ->orderBy('date_operation', 'DESC')
            ->findAll();
    }
}