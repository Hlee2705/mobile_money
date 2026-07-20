<?php

namespace App\Validations;

class AuthValidation
{

    /**
     * Vérifie le format du numéro
     */
    public function validerNumero(string $numero): array
    {

        if (empty($numero)) {
            return [
                'success' => false,
                'message' => 'Le numéro est obligatoire'
            ];
        }


        if (!preg_match('/^[0-9]{10}$/', $numero)) {
            return [
                'success' => false,
                'message' => 'Le numéro doit contenir 10 chiffres'
            ];
        }


        return [
            'success' => true
        ];
    }
}