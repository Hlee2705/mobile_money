<?php

namespace App\Validations;


class RetraitValidation
{

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