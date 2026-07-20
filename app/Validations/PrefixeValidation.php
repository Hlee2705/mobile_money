<?php

namespace App\Validation;

class PrefixeValidation
{
    public static function rules(): array
    {
        return [
            'code' => [
                'rules' => 'required|regex_match[/^\+?[0-9]+$/]',
                'errors' => [
                    'required' => 'Le code est obligatoire.',
                    'regex_match' => 'Le code doit contenir uniquement des chiffres et éventuellement le caractère +.'
                ]
            ],

            'libelle' => [
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required' => 'Le libellé est obligatoire.',
                    'min_length' => 'Le libellé doit contenir au moins 2 caractères.',
                    'max_length' => 'Le libellé ne doit pas dépasser 100 caractères.'
                ]
            ]
        ];
    }
}