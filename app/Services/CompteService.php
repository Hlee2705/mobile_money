<?php

namespace App\Services;

use App\Models\Compte;
use App\Models\Utilisateur;
use App\Models\HistoriqueTransaction;

class CompteService
{

    protected Compte $compteModel;

    protected Utilisateur $utilisateurModel;

    protected HistoriqueTransaction $historiqueModel;

    public function __construct()
    {
        $this->compteModel = new Compte();

        $this->utilisateurModel = new Utilisateur();

        $this->historiqueModel = new HistoriqueTransaction();
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

    public function getHistorique(int $idUtilisateur): array
    {
        $historique = $this->historiqueModel
            ->select("
            historique_transaction.id,
            type_operation.libelle,
            historique_transaction.numero_receveur,
            historique_transaction.montant,
            historique_transaction.frais,
            historique_transaction.date_operation
        ")
            ->join(
                'type_operation',
                'type_operation.id = historique_transaction.id_type_operation'
            )
            ->where(
                'historique_transaction.id_utilisateur',
                $idUtilisateur
            )
            ->orderBy(
                'historique_transaction.date_operation',
                'DESC'
            )
            ->findAll();

        return [
            'success' => true,
            'historique' => $historique
        ];
    }
}
