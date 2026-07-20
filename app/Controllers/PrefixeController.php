<?php

namespace App\Controllers;

use App\Services\PrefixeService;

class PrefixeController extends BaseController
{
    protected PrefixeService $prefixeService;

    public function __construct()
    {
        $this->prefixeService = new PrefixeService();
    }

    public function index()
    {
        $data = [
            'title' => 'Liste des préfixes',
            'active' => 'prefixe-liste',
            'prefixes' => $this->prefixeService->findAll()
        ];

        return view('prefixe/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Ajouter un nouveau préfixe',
            'active' => 'prefixe-nouveau',
            'prefixes' => $this->prefixeService->findAll()
        ];

        return view('prefixe/create', $data);
    }

    public function store()
    {
        $data = [
            'code' => trim($this->request->getPost('code')),
            'libelle' => trim($this->request->getPost('libelle'))
        ];

        $result = $this->prefixeService->create($data);

        if (!$result['success']) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $result['errors']);
        }

        return redirect()
            ->to('/prefixe/create')
            ->with('success', $result['message']);
    }
}
