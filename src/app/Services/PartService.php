<?php

namespace App\Services;

use App\Models\Part;
use App\Repositories\PartRepository;
use App\Services\Contracts\PartServiceInterface;

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
        } catch (Exception $ex) {
            return new Error($ex->getMessage());
            die('wywaliło getAll()');
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
        } catch (Exception $ex) {
            return new Error($ex->getMessage());
        }
    }
}