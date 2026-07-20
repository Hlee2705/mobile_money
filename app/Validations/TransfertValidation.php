<?php

namespace App\Validations;


class TransfertValidation
{

    public function validerNumeroReceveur(string $numero): array
    {

        if(empty($numero)){

            return [
                'success'=>false,
                'message'=>'Le numéro du receveur est obligatoire'
            ];

        }


        if(!preg_match('/^[0-9]{10}$/', $numero)){

            return [
                'success'=>false,
                'message'=>'Le numéro doit contenir 10 chiffres'
            ];

        }


        return [
            'success'=>true
        ];

    }




    public function validerMontant(float $montant): array
    {

        if($montant <= 0){

            return [
                'success'=>false,
                'message'=>'Le montant doit être supérieur à 0'
            ];

        }


        return [
            'success'=>true
        ];

    }

}