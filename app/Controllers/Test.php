<?php

namespace App\Controllers;

use Config\Database;

class Test extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        echo "Connexion réussie";
    }
}