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

        $this->redirect('/parts');
    }

    public function edit(int $id): void
    {
        # If GET requested return edit view with data to complete the inputs
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $result = $this->service->getById($id);

            if ($result instanceof Error) {
                $this->view('error/index', ['errors' => $result]);
                return;
            }

            $this->view('parts/edit', ['part' => $result]);
            return;
        }

        # If POST requested edit existing part
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        # TODO: Add validation

        $result = $this->service->edit(
            $id,
            $_POST['number'],
            $_POST['name'],
            $_POST['description'],
            floatval($_POST['price'])
        );

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->redirect('/parts');
    }

    public function delete(int $id): void
    {
        # If GET requested return
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        # TODO: Add validation

        $result = $this->service->delete($id);

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->redirect('/parts');
    }
}
