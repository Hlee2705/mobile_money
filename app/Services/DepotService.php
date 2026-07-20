<?php

namespace App\Services;


use App\Models\Compte;
use App\Models\HistoriqueTransaction;
use App\Validations\DepotValidation;


class DepotService
{

    protected Compte $compteModel;

    protected HistoriqueTransaction $historiqueModel;

    protected DepotValidation $validation;



    public function __construct()
    {

        $this->compteModel = new Compte();

        $this->historiqueModel = new HistoriqueTransaction();

        $this->validation = new DepotValidation();
    }




    public function effectuerDepot(
        int $idUtilisateur,
        float $montant
    ): array {


        /*
         * Validation montant
         */

        $validation = $this->validation
            ->validerMontant($montant);



        if (!$validation['success']) {

            return $validation;
        }




        /*
         * Recherche compte utilisateur
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




        /*
         * Mise à jour du solde
         */

        $nouveauSolde =
            $compte['solde'] + $montant;



        $this->compteModel->update(
            $compte['id'],
            [
                'solde' => $nouveauSolde
            ]
        );





        /*
         * Historique transaction
         */

        $resultInsert = $this->historiqueModel->insert([

            'id_utilisateur' => $idUtilisateur,
            'id_type_operation' => 1,
            'montant' => $montant,
            'frais' => 0

        ]);


        var_dump($resultInsert);
        var_dump($this->historiqueModel->errors());

        exit;




        return [
            'success' => true,
            'message' => 'Dépôt effectué avec succès',
            'solde' => $nouveauSolde
        ];
    }
}
