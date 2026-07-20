<?php

namespace App\Controllers;

use App\Services\HistoriqueTransactionService;

class GainsController extends BaseController
{
    protected HistoriqueTransactionService $historiqueService;

    public function __construct()
    {
        $this->historiqueService = new HistoriqueTransactionService();
    }

    public function index()
    {
        $transfertsNormaux = $this->historiqueService->listerTransfertsNormaux();
        $transfertsAutres = $this->historiqueService->listerTransfertsAutres();
        $retraits = $this->historiqueService->listerRetraits();

        return view('gains/index', [
            'title' => 'Gains',
            'active' => 'gains',

            'gainFraisTransfertNormal' => $this->historiqueService->totalFraisTransfertNormal(),
            'gainFraisTransfertAutre' => $this->historiqueService->totalFraisTransfertAutre(),
            'gainCommissionTransfertAutre' => $this->historiqueService->totalCommissionTransfertAutre(),
            'gainFraisRetrait' => $this->historiqueService->totalFraisRetrait(),

            'transfertsNormaux' => $transfertsNormaux['data'],
            'pagerTransfertsNormaux' => $transfertsNormaux['pager'],

            'transfertsAutres' => $transfertsAutres['data'],
            'pagerTransfertsAutres' => $transfertsAutres['pager'],

            'retraits' => $retraits['data'],
            'pagerRetraits' => $retraits['pager'],
        ]);
    }
}
