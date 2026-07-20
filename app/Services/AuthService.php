<?php

namespace App\Services;

use App\Models\Prefixe;
use App\Models\Utilisateur;
use App\Validations\AuthValidation;

class AuthService
{
    protected Prefixe $prefixeModel;
    protected Utilisateur $utilisateurModel;
    protected AuthValidation $validation;

    public function __construct()
    {
        $this->prefixeModel = new Prefixe();
        $this->utilisateurModel = new Utilisateur();
        $this->validation = new AuthValidation();
    }

    public function login(string $numero): array
    {
        /*
         * Validation du numéro
         */
        $validation = $this->validation->validerNumero($numero);

        if (!$validation['success']) {
            return $validation;
        }

        /*
         * Vérification du préfixe
         */
        $codePrefixe = substr($numero, 0, 3);

        $prefixe = $this->prefixeModel
            ->where('code', $codePrefixe)
            ->first();

        if (!$prefixe) {
            return [
                'success' => false,
                'message' => 'Préfixe inexistant'
            ];
        }

        /*
         * Seuls les préfixes "normal" peuvent se connecter
         */
        if ($prefixe['type_prefixe'] !== 'normal') {
            return [
                'success' => false,
                'message' => 'Les numéros des autres opérateurs ne peuvent pas se connecter'
            ];
        }

        /*
         * Recherche utilisateur
         */
        $utilisateur = $this->utilisateurModel
            ->where('numero', $numero)
            ->first();

        if (!$utilisateur) {
            return [
                'success' => false,
                'message' => 'Utilisateur inexistant'
            ];
        }

        /*
         * Création de la session
         */
        session()->set([
            'logged_in'      => true,
            'id_utilisateur' => $utilisateur['id'],
            'id_role'        => $utilisateur['id_role'],
            'numero'         => $utilisateur['numero']
        ]);

        return [
            'success' => true,
            'utilisateur' => $utilisateur
        ];
    }
}