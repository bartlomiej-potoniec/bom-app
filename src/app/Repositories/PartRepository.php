<?php

namespace App\Repositories;


final class PartRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $sql = 'SELECT id, number, name, description, price FROM parts';

        $this->db->query($sql);
        $results = $this->db->resultSet();

        return $results;
    }
}