<?php

namespace App\Validations;

class CompteValidation
{
    public function validerUtilisateur(?int $idUtilisateur): array
    {
        if (empty($idUtilisateur)) {
            return [
                'success' => false,
                'message' => 'Utilisateur non connecté'
            ];
        }

        return [
            'success' => true
        ];
    }
}