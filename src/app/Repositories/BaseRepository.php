<?php

namespace App\Repositories;

use App\Core\Database;


class BaseRepository
{
    protected Database $db;

    protected function __construct()
    {
        $this->db = new Database();
    }
}