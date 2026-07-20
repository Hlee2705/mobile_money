<?php

namespace App\Controllers;

use App\Services\CompteService;

class CompteController extends BaseController
{
    protected CompteService $service;

    public function __construct()
    {
        $this->service = new CompteService();
    }

    public function solde()
    {
        $idUtilisateur = session()->get('id_utilisateur');

        $result = $this->service->obtenirSolde($idUtilisateur);

        if (!$result['success']) {
            return redirect()
                ->back()
                ->with('error', $result['message']);
        }

        return view('client/solde', [
            'solde' => $result['solde']
        ]);
    }
}