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
            $this->request->getPost('numero_receveur');


        $montant =
            (float)$this->request->getPost('montant');



        $idUtilisateur =
            session()->get('id_utilisateur');




        $result =
            $this->service->effectuerTransfert(
                $idUtilisateur,
                $numero,
                $montant
            );



        if(!$result['success']){

            return redirect()
                ->back()
                ->with(
                    'error',
                    $result['message']
                );

        }



        return redirect()
            ->to('/dashboard')
            ->with(
                'success',
                $result['message']
            );


    }


}