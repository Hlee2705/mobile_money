<?php

namespace App\Services;

use App\Models\Compte;


class CompteService
{

    protected Compte $compteModel;


    public function __construct()
    {
        $this->compteModel = new Compte();
    }



    /**
     * Récupérer le solde du compte de l'utilisateur connecté
     */
    public function obtenirSolde(int $idUtilisateur): array
    {

        /*
         * Recherche du compte
         */
        $compte = $this->compteModel
            ->where(
                'id_utilisateur',
                $idUtilisateur
            )
            ->first();



        if(!$compte){

            return [
                'success' => false,
                'message' => 'Compte introuvable'
            ];

        }



        return [
            'success' => true,
            'solde' => $compte['solde']
        ];

    }


}