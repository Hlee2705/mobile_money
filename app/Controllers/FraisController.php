<?php

namespace App\Controllers;

use App\Services\TrancheService;
use App\Services\FraisService;

class FraisController extends BaseController
{
    protected TrancheService $trancheService;
    protected FraisService $fraisService;

    public function __construct()
    {
        $this->trancheService = new TrancheService();
        $this->fraisService = new FraisService();
    }

    public function index()
    {
        $data = [
            'title' => 'Liste des frais',
            'active' => 'frais-baremes',
            'fraisTotal' => $this->fraisService->getAllFrais()
        ];

        return view('frais/index', $data);
    }
}
