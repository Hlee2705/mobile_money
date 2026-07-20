<?php

namespace App\Services;

use App\Models\Prefixe;
use App\Models\Utilisateur;

class AuthService
{
    protected Prefixe $prefixeModel;
    protected Utilisateur $utilisateurModel;


    public function __construct()
    {
        $this->prefixeModel = new Prefixe();
        $this->utilisateurModel = new Utilisateur();
    }


    /**
     * Vérifie si le numéro possède un préfixe valide
     */
    public function verifierPrefixe(string $numero)
    {
        $code = substr($numero, 0, 3);

        return $this->prefixeModel
            ->where('code', $code)
            ->first();
    }



    /**
     * Connexion utilisateur par numéro
     */
    public function login(string $numero)
    {

        // Vérification du préfixe
        $prefixe = $this->verifierPrefixe($numero);


        if (!$prefixe) {
            return [
                'success' => false,
                'message' => 'Préfixe non valide'
            ];
        }



        // Recherche utilisateur
        $utilisateur = $this->utilisateurModel
            ->where('numero', $numero)
            ->first();



        if (!$utilisateur) {

            return [
                'success' => false,
                'message' => 'Utilisateur introuvable'
            ];
        }



        // Création session
        session()->set([
            'id_utilisateur' => $utilisateur['id'],
            'numero' => $utilisateur['numero'],
            'id_role' => $utilisateur['id_role'],
            'connecte' => true
        ]);


        return [
            'success' => true,
            'utilisateur' => $utilisateur
        ];
    }
}