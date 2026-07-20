<?php

namespace App\Controllers;


use App\Services\DepotService;


class DepotController extends BaseController
{

    protected DepotService $depotService;



    public function __construct()
    {

        $this->depotService = new DepotService();

    }




    public function index()
    {

        return view('client/depot');

    }




    public function effectuer()
    {


        $montant = $this->request
            ->getPost('montant');



        $idUtilisateur = session()
            ->get('id_utilisateur');



        $result = $this->depotService
            ->effectuerDepot(
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