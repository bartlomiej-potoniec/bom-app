<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AssemblyService;


class Home extends Controller
{
    private AssemblyService $service;

    public function __construct()
    {
        $this->service = new AssemblyService;
    }

    public function index(): void
    {
        $assemblies = $this->service->getAll();

        $data = [
            'parts' => $assemblies
        ];

        $this->view('home/index', $data);
    }
}