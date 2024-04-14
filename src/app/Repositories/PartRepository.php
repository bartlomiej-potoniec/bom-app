<?php

namespace App\Repositories;

use App\Repositories\Contracts\PartRepositoryInterface;


final class PartRepository extends BaseRepository implements PartRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Part[]
     */
    public function getAll(): array
    {
        $sql = 'SELECT id, number, name, description, price FROM parts';

        $this->db->query($sql);
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
}