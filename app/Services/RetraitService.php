<?php

namespace App\Services;


use App\Models\Compte;
use App\Models\Frais;
use App\Models\HistoriqueTransaction;
use App\Validations\RetraitValidation;


class RetraitService
{

    protected Compte $compteModel;

    protected Frais $fraisModel;

    protected HistoriqueTransaction $historiqueModel;

    protected RetraitValidation $validation;



    public function __construct()
    {

        $this->compteModel = new Compte();

        $this->fraisModel = new Frais();

        $this->historiqueModel = new HistoriqueTransaction();

        $this->validation = new RetraitValidation();

    }





    public function effectuerRetrait(
        int $idUtilisateur,
        float $montant
    ):array
    {


        // Validation

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






        // Recherche frais

        $frais =
            $this->fraisModel
            ->select('frais.valeur')
            ->join(
                'tranche',
                'tranche.id=frais.id_tranche'
            )
            ->where(
                'tranche.min <=',
                $montant
            )
            ->where(
                'tranche.max >=',
                $montant
            )
            ->where(
                'id_type_operation',
                2
            )
            ->first();




        if(!$frais){

            return [
                'success'=>false,
                'message'=>'Frais introuvables'
            ];

        }




        $montantFrais =
            $frais['valeur'];




        $total =
            $montant + $montantFrais;





        // Vérification solde


        if($compte['solde'] < $total){

            return [
                'success'=>false,
                'message'=>'Solde insuffisant'
            ];

        }





        // Mise à jour solde


        $nouveauSolde =
            $compte['solde'] - $total;



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

            'frais'=>$montantFrais

        ]);





        return [

            'success'=>true,

            'message'=>'Retrait effectué avec succès',

            'solde'=>$nouveauSolde

        ];



    }



}