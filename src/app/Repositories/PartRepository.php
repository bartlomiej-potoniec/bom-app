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

    public function getById(int $id): object
    {
        $sql = 'SELECT id, number, name, description, price FROM parts
                    WHERE id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        $result = $this->db->single();
        return $result;
    }

    public function getByAssemblyId(int $assemblyId): array
    {
        $sql = 'SELECT p.id, p.number, p.name, p.description, p.price FROM parts AS p
                    JOIN assembly_parts AS ap
                        ON p.id = ap.part_id
                    JOIN assemblies AS a
                        ON a.id = ap.assembly_id
                    WHERE a.id = :id';

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

    public function create(
        string $number,
        string $name,
        ?string $description,
        ?float $price
    ): void {
        $sql = 'INSERT INTO parts (number, name, description, price)
                    VALUES (:number, :name, :description, :price)';

        $this->db->query($sql);

        $this->db->bind(':number', $number);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);

        $this->db->execute();
    }

    public function edit(
        int $id,
        string $number,
        string $name,
        ?string $description,
        ?float $price
    ): void {
        $sql = 'UPDATE parts SET number = :number, name = :name, description = :description, price = :price
                    WHERE id = :id';

        $this->db->query($sql);

        $this->db->bind(':id', $id);
        $this->db->bind(':number', $number);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);

        $this->db->execute();
    }

    function delete(int $id): void
    {
        $sql = 'DELETE FROM parts WHERE id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        $this->db->execute();
    }
}