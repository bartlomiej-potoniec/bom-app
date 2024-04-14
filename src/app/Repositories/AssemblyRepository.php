<?php

namespace App\Repositories;

use App\Repositories\Contracts\AssemblyRepositoryInterface;


final class AssemblyRepository extends BaseRepository implements AssemblyRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $sql = 'SELECT id, number, name, description FROM assemblies';

        $this->db->query($sql);
        $results = $this->db->resultSet();

        return $results;
    }
}