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

    public function getById(int $id): object
    {
        $sql = 'SELECT id, number, name, description FROM assemblies
                    WHERE id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        $result = $this->db->single();
        return $result;
    }
}