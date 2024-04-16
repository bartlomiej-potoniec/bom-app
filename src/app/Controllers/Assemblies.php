<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AssemblyService;
use App\Services\Contracts\AssemblyServiceInterface;
use Error;


class Assemblies extends Controller
{
    private AssemblyServiceInterface $service;

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

        $this->view('home/index', ['assemblies' => $result]);
    }

    public function details(int $assemblyId): void
    {
        $result = $this->service->getAssemblyWithParts($assemblyId);

        if ($result instanceof Error) {
            $this->view('error/index', ['errors' => $result]);
            return;
        }

        $this->view('assemblies/details', ['assemblyParts' => $result]);
    }
}
