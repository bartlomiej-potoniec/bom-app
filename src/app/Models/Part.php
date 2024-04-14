<?php

namespace App\Models;


final class Part
{
    private int $id;
    private string $number;
    private string $name;
    private string $description;
    private float $price;

    private function __construct(
        int $id,
        string $number,
        string $name,
        string $description,
        float $price
    ) {
        $this->id = $id;
        $this->number = $number;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    # Factory methods
    public static function create(
        int $id,
        string $number,
        string $name,
        string $description,
        float $price
    ): self {
        return new self($id, $number, $name, $description, $price);
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
                $item->price
            );

            array_push($parts, $part);
        }

        return $parts;
    }
}