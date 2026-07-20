<?php

namespace App\Services;


use App\Models\Compte;
use App\Models\HistoriqueTransaction;
use App\Validations\RetraitValidation;


class RetraitService
{

    protected Compte $compteModel;

    protected HistoriqueTransaction $historiqueModel;

    protected RetraitValidation $validation;

    protected FraisService $fraisService;



    public function __construct()
    {

        $this->compteModel = new Compte();

        $this->historiqueModel = new HistoriqueTransaction();

        $this->validation = new RetraitValidation();

        $this->fraisService = new FraisService();

    }





    public function effectuerRetrait(
        int $idUtilisateur,
        float $montant
    ): array
    {


        // Validation montant

        $check =
            $this->validation->validerMontant($montant);



        if(!$check['success']){

            return $check;

        }





        // Recherche compte

        $compte =
            $this->compteModel
            ->where(
                'id_utilisateur',
                $idUtilisateur
            )
            ->first();



        if(!$compte){

            return [
                'success'=>false,
                'message'=>'Compte introuvable'
            ];

        }





        // Calcul frais retrait
        // 2 = retrait

        $frais =
            $this->fraisService
            ->calculerFrais(
                $montant,
                2
            );





        $totalDebit =
            $montant + $frais;






        // Vérification solde

        if($compte['solde'] < $totalDebit){

            return [
                'success'=>false,
                'message'=>'Solde insuffisant'
            ];

        }





        // Nouveau solde

        $nouveauSolde =
            $compte['solde'] - $totalDebit;





        $this->compteModel->update(
            $compte['id'],
            [
                'solde'=>$nouveauSolde
            ]
        );







        // Historique

        $this->historiqueModel->insert([

            'id_utilisateur'=>$idUtilisateur,

            'id_type_operation'=>2,

            'montant'=>$montant,

            'frais'=>$frais,

            'commission'=>0

        ]);






        return [

            'success'=>true,

            'message'=>'Retrait effectué avec succès',

            'solde'=>$nouveauSolde,

            'frais'=>$frais

        ];


    }

}