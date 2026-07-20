<?php

namespace App\Controllers;

use App\Services\TrancheService;

class FraisController extends BaseController
{
    protected TrancheService $trancheService;

    public function __construct()
    {
        $this->trancheService = new TrancheService();
    }

    public function index()
    {
        $data = [
            'title' => 'Liste des frais',
            'active' => 'frais-baremes',
            'tranches' => $this->trancheService->findAll()
        ];

        return view('tranche/index', $data);
    }
}