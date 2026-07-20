<?php

namespace App\Services;

use App\Models\Prefixe;
use App\Validations\PrefixeValidation;

class PrefixeService
{
    protected Prefixe $prefixeModel;

    public function __construct()
    {
        $this->prefixeModel = new Prefixe();
    }

    public function create(array $data): array
    {
        $validation = \Config\Services::validation();

        if (!$validation->setRules(PrefixeValidation::rules())->run($data)) {
            return [
                'success' => false,
                'errors' => $validation->getErrors()
            ];
        }

        $existant = $this->prefixeModel
            ->where('code', $data['code'])
            ->first();

        if ($existant) {
            return [
                'success' => false,
                'errors' => [
                    'code' => 'Ce préfixe existe déjà.'
                ]
            ];
        }

        $this->prefixeModel->insert($data);

        return [
            'success' => true,
            'message' => 'Préfixe créé avec succès.',
            'id' => $this->prefixeModel->getInsertID()
        ];
    }

    public function findAll(): array
    {
        return $this->prefixeModel
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    public function findById(int $id)
    {
        return $this->prefixeModel->find($id);
    }

    public function update(int $id, array $data): array
    {
        $prefixe = $this->findById($id);

        if (!$prefixe) {
            return [
                'success' => false,
                'message' => 'Préfixe introuvable.'
            ];
        }

        $validation = \Config\Services::validation();

        if (!$validation->setRules(PrefixeValidation::rules())->run($data)) {
            return [
                'success' => false,
                'errors' => $validation->getErrors()
            ];
        }

        $existant = $this->prefixeModel
            ->where('code', $data['code'])
            ->where('id !=', $id)
            ->first();


        if ($existant) {
            return [
                'success' => false,
                'errors' => [
                    'code' => 'Ce préfixe existe déjà.'
                ]
            ];
        }

        $this->prefixeModel->update($id, $data);

        return [
            'success' => true,
            'message' => 'Préfixe modifié avec succès.'
        ];
    }

    public function delete(int $id): array
    {
        $prefixe = $this->findById($id);

        if (!$prefixe) {
            return [
                'success' => false,
                'message' => 'Préfixe introuvable.'
            ];
        }

        $this->prefixeModel->delete($id);

        return [
            'success' => true,
            'message' => 'Préfixe supprimé avec succès.'
        ];
    }

    public function estUnAutreNumero(string $numero): bool
    {
        $code = substr($numero, 0, 3);

        $prefixe = $this->prefixeModel
            ->where('type_prefixe', 'normal')
            ->where('code', $code)
            ->first();

        return $prefixe === null;
    }
}