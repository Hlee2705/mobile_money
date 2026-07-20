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
}
