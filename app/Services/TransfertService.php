<?php

namespace App\Services;


use App\Models\Compte;
use App\Models\Utilisateur;
use App\Models\HistoriqueTransaction;
use App\Validations\TransfertValidation;


class TransfertService
{

    protected Compte $compteModel;

    protected Utilisateur $utilisateurModel;

    protected HistoriqueTransaction $historiqueModel;

    protected TransfertValidation $validation;

    protected FraisService $fraisService;




    public function __construct()
    {

        $this->compteModel = new Compte();

        $this->utilisateurModel = new Utilisateur();

        $this->historiqueModel = new HistoriqueTransaction();

        $this->validation = new TransfertValidation();

        $this->fraisService = new FraisService();

    }






    public function effectuerTransfert(
        int $idUtilisateur,
        string $numeroReceveur,
        float $montant
    ): array
    {


        // Validation montant

        $checkMontant =
            $this->validation
            ->validerMontant($montant);



        if(!$checkMontant['success']){

            return $checkMontant;

        }





        // Validation numéro

        $checkNumero =
            $this->validation
            ->validerNumeroReceveur($numeroReceveur);



        if(!$checkNumero['success']){

            return $checkNumero;

        }






        // Compte expéditeur

        $compteExpediteur =
            $this->compteModel
            ->where(
                'id_utilisateur',
                $idUtilisateur
            )
            ->first();




        if(!$compteExpediteur){

            return [
                'success'=>false,
                'message'=>'Compte expéditeur introuvable'
            ];

        }







        // Recherche receveur

        $receveur =
            $this->utilisateurModel
            ->where(
                'numero',
                $numeroReceveur
            )
            ->first();




        if(!$receveur){

            return [
                'success'=>false,
                'message'=>'Receveur introuvable'
            ];

        }







        // Compte receveur

        $compteReceveur =
            $this->compteModel
            ->where(
                'id_utilisateur',
                $receveur['id']
            )
            ->first();




        if(!$compteReceveur){

            return [
                'success'=>false,
                'message'=>'Compte receveur introuvable'
            ];

        }







        // Calcul frais transfert
        // 3 = transfert

        $frais =
            $this->fraisService
            ->calculerFrais(
                $montant,
                3
            );





        $totalDebit =
            $montant + $frais;







        // Vérification solde

        if($compteExpediteur['solde'] < $totalDebit){

            return [
                'success'=>false,
                'message'=>'Solde insuffisant'
            ];

        }







        // Débit expéditeur

        $this->compteModel->update(
            $compteExpediteur['id'],
            [
                'solde'=>$compteExpediteur['solde'] - $totalDebit
            ]
        );







        // Crédit receveur

        $this->compteModel->update(
            $compteReceveur['id'],
            [
                'solde'=>$compteReceveur['solde'] + $montant
            ]
        );







        // Historique

        $this->historiqueModel->insert([

            'id_utilisateur'=>$idUtilisateur,

            'numero_receveur'=>$numeroReceveur,

            'id_type_operation'=>3,

            'montant'=>$montant,

            'frais'=>$frais,

            'commission'=>0

        ]);







        return [

            'success'=>true,

            'message'=>'Transfert effectué avec succès',

            'frais'=>$frais

        ];

    }

}