<?php

namespace App\Services;


use App\Models\Compte;
use App\Models\Utilisateur;
use App\Models\Prefixe;
use App\Models\HistoriqueTransaction;
use App\Validations\TransfertValidation;


class TransfertService
{

    protected Compte $compteModel;

    protected Utilisateur $utilisateurModel;

    protected Prefixe $prefixeModel;

    protected HistoriqueTransaction $historiqueModel;

    protected TransfertValidation $validation;

    protected FraisService $fraisService;

    protected PromotionConfigService $promotionConfigService;

    protected PrefixeService $prefixeService;



    public function __construct()
    {

        $this->compteModel = new Compte();

        $this->utilisateurModel = new Utilisateur();

        $this->prefixeModel = new Prefixe();

        $this->historiqueModel = new HistoriqueTransaction();

        $this->validation = new TransfertValidation();

        $this->fraisService = new FraisService();

        $this->promotionConfigService = new PromotionConfigService();

        $this->prefixeService = new PrefixeService();
    }





    public function effectuerTransfert(
        int $idUtilisateur,
        string $numeroReceveur,
        float $montant,
        bool $inclureFraisRetrait = false
    ): array {


        /*
         * Validation montant
         */

        $checkMontant =
            $this->validation
            ->validerMontant($montant);



        if (!$checkMontant['success']) {

            return $checkMontant;
        }





        /*
         * Validation numéro
         */

        $checkNumero =
            $this->validation
            ->validerNumeroReceveur($numeroReceveur);



        if (!$checkNumero['success']) {

            return $checkNumero;
        }






        /*
         * Recherche expéditeur
         */

        $compteExpediteur =
            $this->compteModel
            ->where(
                'id_utilisateur',
                $idUtilisateur
            )
            ->first();



        if (!$compteExpediteur) {

            return [
                'success' => false,
                'message' => 'Compte expéditeur introuvable'
            ];
        }






        /*
         * Recherche receveur
         */

        $receveur =
            $this->utilisateurModel
            ->where(
                'numero',
                $numeroReceveur
            )
            ->first();



        if (!$receveur) {

            return [
                'success' => false,
                'message' => 'Receveur introuvable'
            ];
        }






        /*
         * Recherche compte receveur
         */

        $compteReceveur =
            $this->compteModel
            ->where(
                'id_utilisateur',
                $receveur['id']
            )
            ->first();



        if (!$compteReceveur) {

            return [
                'success' => false,
                'message' => 'Compte receveur introuvable'
            ];
        }







        /*
         * Vérification réseau receveur
         */

        $prefixeReceveur =
            substr($numeroReceveur, 0, 3);



        $prefixe =
            $this->prefixeModel
            ->where(
                'code',
                $prefixeReceveur
            )
            ->first();



        if (!$prefixe) {

            return [
                'success' => false,
                'message' => 'Préfixe receveur inconnu'
            ];
        }







        /*
         * Frais transfert
         * type_operation = 3
         */

        $fraisTransfert =
            $this->fraisService
            ->calculerFrais(
                $montant,
                3
            );

        if (!($this->prefixeService->estUnAutreNumero($numeroReceveur))) {
            $promotion = $this->promotionConfigService->findAll()[0]['valeur'];
            $fraisTransfert -= (($fraisTransfert * $promotion) / 100);
        }


        /*
         * Frais retrait inclus
         *
         * Seulement pour même opérateur
         */

        $fraisRetrait = 0;



        if (
            $inclureFraisRetrait
            &&
            $prefixe['type_prefixe'] == 'normal'
        ) {

            $fraisRetrait =
                $this->fraisService
                ->calculerFrais(
                    $montant,
                    2
                );
        }







        /*
         * Total débité
         */

        $totalDebit =
            $montant
            +
            $fraisTransfert
            +
            $fraisRetrait;







        /*
         * Vérification solde
         */

        if ($compteExpediteur['solde'] < $totalDebit) {

            return [
                'success' => false,
                'message' => 'Solde insuffisant'
            ];
        }







        /*
         * Débit expéditeur
         */

        $this->compteModel->update(

            $compteExpediteur['id'],

            [

                'solde' =>
                $compteExpediteur['solde']
                    -
                    $totalDebit

            ]

        );







        /*
         * Crédit receveur
         */

        $this->compteModel->update(

            $compteReceveur['id'],

            [

                'solde' =>
                $compteReceveur['solde']
                    +
                    $montant

            ]

        );







        /*
         * Historique
         */

        $this->historiqueModel->insert([


            'id_utilisateur' => $idUtilisateur,


            'numero_receveur' => $numeroReceveur,


            'id_type_operation' => 3,


            'montant' => $montant,


            'frais' =>
            $fraisTransfert
                +
                $fraisRetrait,


            'commission' => 0


        ]);

        return [

            'success' => true,

            'message' => 'Transfert effectué avec succès',

            'frais_transfert' => $fraisTransfert,

            'frais_retrait' => $fraisRetrait,

            'total_debite' => $totalDebit

        ];
    }
}
