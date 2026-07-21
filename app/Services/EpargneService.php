<?php

namespace App\Services;

use App\Models\Epargne;

class EpargneService{
    protected Epargne $epargneModel;

    public function __construct()
    {
        $this->epargneModel = new Epargne();
    }
}