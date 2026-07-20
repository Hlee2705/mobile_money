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



    public function login(string $numero)
    {

        // Validation format
        $validation = $this->validation
            ->validerNumero($numero);


        if (!$validation['success']) {
            return $validation;
        }



        // Vérification préfixe
        $prefixe = $this->prefixeModel
            ->where(
                'code',
                substr($numero,0,3)
            )
            ->first();



        if (!$prefixe) {

            return [
                'success'=>false,
                'message'=>'Préfixe non autorisé'
            ];
        }



        // Recherche utilisateur
        $utilisateur = $this->utilisateurModel
            ->where('numero',$numero)
            ->first();



        if (!$utilisateur){

            return [
                'success'=>false,
                'message'=>'Utilisateur inexistant'
            ];
        }


        session()->set([
            'id_utilisateur'=>$utilisateur['id'],
            'id_role'=>$utilisateur['id_role'],
            'numero'=>$numero
        ]);


        return [
            'success'=>true,
            'utilisateur'=>$utilisateur
        ];

    }
}