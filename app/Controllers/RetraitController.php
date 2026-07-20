<?php

namespace App\Controllers;


use App\Services\RetraitService;


class RetraitController extends BaseController
{


    protected RetraitService $service;



    public function __construct()
    {

        $this->service = new RetraitService();

    }





    public function index()
    {

        return view('client/retrait');

    }





    public function effectuer()
    {


        $montant =
            (float)$this->request->getPost('montant');



        $idUtilisateur =
            session()->get('id_utilisateur');




        $result =
            $this->service->effectuerRetrait(
                $idUtilisateur,
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