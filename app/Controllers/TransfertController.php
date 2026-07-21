<?php

namespace App\Controllers;


use App\Services\TransfertService;


class TransfertController extends BaseController
{


    protected TransfertService $service;



    public function __construct()
    {

        $this->service = new TransfertService();
    }





    public function index()
    {

        return view('client/transfert');
    }







    public function effectuer()
    {


        $numero =
            $this->request
            ->getPost('numero_receveur');



        $montant =
            (float)$this->request
                ->getPost('montant');




        /*
         * Checkbox frais retrait
         */

        $inclureFraisRetrait =
            $this->request
            ->getPost('inclure_frais_retrait')
            ? true
            : false;






        $idUtilisateur =
            session()
            ->get('id_utilisateur');







        $result =
            $this->service
            ->effectuerTransfert(

                $idUtilisateur,

                $numero,

                $montant,

                $inclureFraisRetrait

            );







        if (!$result['success']) {


            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $result['message']
                );
        }







        return redirect()
            ->to('/transfert')
            ->with(
                'success',
                $result['message']
            );
    }

    public function multiple()
    {
        return view('client/transfert');
    }

    public function effectuerMultiple()
    {

        $numeros = preg_split(
            '/\r\n|\r|\n/',
            trim(
                $this->request->getPost('numeros')
            )
        );

        $numeros = array_map('trim', $numeros);

        $numeros = array_filter($numeros);

        $montant =
            (float)$this->request
                ->getPost('montant');

        $inclureFraisRetrait =
            $this->request
            ->getPost('inclure_frais_retrait')
            ? true
            : false;

        $idUtilisateur =
            session()->get('id_utilisateur');

        $result =
            $this->service
            ->effectuerTransfertMultiple(
                $idUtilisateur,
                $numeros,
                $montant,
                $inclureFraisRetrait
            );

        if (!$result['success']) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    $result['message']
                );
        }

        return redirect()
            ->to('/transfert-multiple')
            ->with(
                'success',
                $result['message']
            );
    }
}
