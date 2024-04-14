<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\PartService;


class Parts extends Controller
{
    private PartService $service;

    public function __construct()
    {
        $this->service = new PartService;
    }

    public function index(): void
    {
        $parts = $this->service->getAll();

        $data = [
            'parts' => $parts
        ];

        $this->view('parts/index', $data);
    }
}