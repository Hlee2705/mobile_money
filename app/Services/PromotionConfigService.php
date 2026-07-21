<?php

namespace App\Services;

use App\Models\PromotionConfig;

class PromotionConfigService
{
    protected PromotionConfig $promotionConfigModel;

    public function __construct()
    {
        $this->promotionConfigModel = new PromotionConfig();
    }

    public function findAll(): array
    {
        return $this->promotionConfigModel->findAll();
    }
}