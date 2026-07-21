<?php

namespace App\Services;

use App\Models\Compte;
use App\Models\Utilisateur;


class CompteService
{

    protected Compte $compteModel;

    protected Utilisateur $utilisateurModel;

    public function __construct()
    {
        $this->compteModel = new Compte();

        $this->utilisateurModel = new Utilisateur();
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



        if (!$compte) {

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

    public function getListeClients(): array
    {

        $utilisateurs = $this->utilisateurModel
            ->where('id_role', 2)
            ->findAll();



        return [
            'success' => true,
            'clients' => $utilisateurs
        ];
    }
}
