<?php

namespace App\Repositories;

use App\Repositories\Contracts\PartRepositoryInterface;


final class PartRepository extends BaseRepository implements PartRepositoryInterface
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