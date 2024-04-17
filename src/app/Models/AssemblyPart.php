<?php

namespace App\Models;


final class AssemblyPart
{
    private int $id;
    private string $number;
    private string $name;
    private ?string $description;
    private int $quantity;
    private ?float $price;
    private ?float $totalCost;

    private function __construct(
        int $id,
        string $number,
        string $name,
        ?string $description,
        int $quantity,
        ?float $price,
        ?float $totalCost
    ) {
        $this->id = $id;
        $this->number = $number;
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->totalCost = $totalCost;
    }

    # Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getTotalCost(): ?float
    {
        return $this->totalCost;
    }

    # Factory methods
    public static function create(
        int $id,
        string $number,
        string $name,
        ?string $description,
        int $quantity,
        ?float $price,
        ?float $totalCost
    ): self {
        return new self(
            $id,
            $number,
            $name,
            $description,
            $quantity,
            $price,
            $totalCost
        );
    }

    public static function createSet(array $data): array
    {
        $parts = [];

        foreach ($data as $item) {
            $part = self::create(
                $item->id,
                $item->number,
                $item->name,
                $item->description,
                $item->quantity,
                $item->price,
                $item->total_cost
            );

            array_push($parts, $part);
        }

        return $parts;
    }
}