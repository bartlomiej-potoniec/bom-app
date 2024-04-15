<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AssemblyService;
use Error;


class Home extends Controller
{
    private AssemblyService $service;

    public function __construct()
    {
        $this->service = new AssemblyService;
    }

    public function index(): void
    {
        $result = $this->service->getAll();

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $data = [
            'parts' => $result
        ];

        $this->view('home/index', $data);
    }
}