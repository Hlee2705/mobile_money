<?php

namespace App\Services;

use App\Models\VueFraisBareme;

class FraisService
{
    protected VueFraisBareme $model;


    public function __construct()
    {
        $this->model = new VueFraisBareme();
    }



    public function getAllFrais()
    {
        return $this->model
            ->orderBy('min', 'ASC')
            ->findAll();
    }

    /**
     * Calculer le frais selon le montant et le type d'opération
     */
    public function calculerFrais(
        float $montant,
        int $typeOperation
    ): float
    {


        $bareme = $this->model
            ->where('min <=', $montant)
            ->where('max >=', $montant)
            ->first();



        if(!$bareme){

            return 0;

        }



        if($typeOperation == 2){

            return (float)$bareme['frais_retrait'];

        }



        if($typeOperation == 3){

            return (float)$bareme['frais_transfert'];

        }



        return 0;

    }


}