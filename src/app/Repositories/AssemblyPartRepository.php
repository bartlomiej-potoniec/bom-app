<?php

namespace App\Repositories;

use App\Repositories\Contracts\AssemblyPartRepositoryInterface;


final class AssemblyPartRepository
    extends BaseRepository implements AssemblyPartRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getByAssemblyId(int $assemblyId): array
    {
        $sql = 'SELECT p.id, p.number, p.name, p.description, ap.quantity, p.price, ap.total_cost
                    FROM parts AS p
                    JOIN assembly_parts AS ap
                        ON p.id = ap.part_id
                    JOIN assemblies AS a
                        ON a.id = ap.assembly_id
                    WHERE ap.assembly_id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $assemblyId);

        $results = $this->db->resultSet();

        return $results;
    }

    function getUnassignedToAssemblyWithId(int $assemblyId): array
    {
        $sql = 'SELECT p.id, p.number, p.name, p.description, p.price FROM parts AS p
                    LEFT JOIN assembly_parts AS ap
                        ON p.id = ap.part_id
                        AND ap.assembly_id = :id
                    WHERE ap.assembly_id IS NULL;';

        $this->db->query($sql);
        $this->db->bind(':id', $assemblyId);

        $results = $this->db->resultSet();

        return $results;
    }
}