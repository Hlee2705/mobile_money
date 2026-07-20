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

    public function listerTransfertsNormaux(int $perPage = 15)
    {
        $data = $this->vueTransfertNormal
            ->orderBy('date_operation', 'DESC')
            ->paginate($perPage, 'transfertsNormaux');

        return ['data' => $data, 'pager' => $this->vueTransfertNormal->pager];
    }

    public function listerTransfertsAutres(int $perPage = 15)
    {
        $data = $this->vueTransfertAutre
            ->orderBy('date_operation', 'DESC')
            ->paginate($perPage, 'transfertsAutres');

        return ['data' => $data, 'pager' => $this->vueTransfertAutre->pager];
    }

    public function listerRetraits(int $perPage = 15)
    {
        $data = $this->vueRetrait
            ->orderBy('date_operation', 'DESC')
            ->paginate($perPage, 'retraits');

        return ['data' => $data, 'pager' => $this->vueRetrait->pager];
    }

    public function totalFraisTransfertNormal()
    {
        return (float) ($this->vueTransfertNormal
            ->selectSum('frais')
            ->first()['frais'] ?? 0);
    }

    public function totalFraisTransfertAutre()
    {
        return (float) ($this->vueTransfertAutre
            ->selectSum('frais')
            ->first()['frais'] ?? 0);
    }

    public function totalCommissionTransfertAutre()
    {
        return (float) ($this->vueTransfertAutre
            ->selectSum('commission')
            ->first()['commission'] ?? 0);
    }

    public function totalFraisRetrait()
    {
        return (float) ($this->vueRetrait
            ->selectSum('frais')
            ->first()['frais'] ?? 0);
    }
}
