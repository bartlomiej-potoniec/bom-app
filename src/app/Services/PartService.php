<?php

namespace App\Services;

use App\Models\Part;
use App\Repositories\PartRepository;
use App\Services\Contracts\PartServiceInterface;
use Error;


final class PartService implements PartServiceInterface
{
    private PartRepository $repository;

    public function __construct() {
        $this->repository = new PartRepository;
    }

    /**
     * @return Part[]|Error
     */
    public function getAll(): array|Error
    {
        try {
            $results = $this->repository->getAll();
            $parts = Part::createSet($results);

            return $parts;
        } catch (Error $error) {
            return $error;
        }
    }

    public function getById(int $id): Part|Error
    {
        try {
            $result = $this->repository->getById($id);

            $part = Part::create(
                $result->id,
                $result->number,
                $result->name,
                $result->description,
                $result->price
            );

            return $part;
        } catch (Error $error) {
            return $error;
        }
    }

    public function create(
        string $number,
        string $name,
        ?string $description,
        ?float $price
    ): bool|Error {
        try {
            $this->repository->create($number, $name, $description, $price);
            return true;
        } catch (Error $error) {
            return $error;
        }
    }
}