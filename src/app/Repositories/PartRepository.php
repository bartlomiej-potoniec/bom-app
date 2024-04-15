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
}