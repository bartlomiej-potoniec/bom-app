<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\PartService;
use Error;


class Parts extends Controller
{
    private PartService $service;

    public function __construct()
    {
        $this->service = new PartService;
    }

    public function index(): void
    {
        $result = $this->service->getAll();

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->view('parts/index', ['parts' => $result]);
    }

    public function details(int $id): void
    {
        $result = $this->service->getById($id);

        if ($result instanceof Error) {
            $this->view('error/index', ['errors' => $result]);
            return;
        }

        $this->view('parts/details', ['part' => $result]);
    }

    public function create(): void
    {
        # If GET requested return view
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('parts/create');
            return;
        }

        # If POST requested create a new part
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        # TODO: Add validation

        $result = $this->service->create(
            $_POST['number'],
            $_POST['name'],
            $_POST['description'],
            floatval($_POST['price'])
        );

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->index();
    }
}
