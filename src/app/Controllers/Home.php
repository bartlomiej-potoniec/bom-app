<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;


class Home extends Controller
{
    public function __construct() {}

    public function index(): void
    {
        $db = new Database();

        $db->query('SELECT * FROM parts');
        $results = $db->resultSet();

        $data = [
            'parts' => $results
        ];

        $this->view('home/index', $data);
    }
}