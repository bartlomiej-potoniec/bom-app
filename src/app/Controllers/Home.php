<?php

namespace App\Controllers;

use App\Core\Controller;


class Home extends Controller
{
    public function __construct() {}

    public function index(): void
    {
        $this->view('home/index');
    }
}