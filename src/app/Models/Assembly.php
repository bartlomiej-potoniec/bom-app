<?php

namespace App\Models;


final class Assembly
{
    private int $id;
    private string $number;
    private string $name;
    private string $description;

    private function __construct(
        int $id,
        string $number,
        string $name,
        string $description,
    ) {
        $this->id = $id;
        $this->number = $number;
        $this->name = $name;
        $this->description = $description;
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

    # Factory methods
    public static function create(
        int $id,
        string $number,
        string $name,
        string $description,
    ): self {
        return new self($id, $number, $name, $description);
    }

    public static function createSet(array $data): array
    {
        $parts = [];

        foreach ($data as $item) {
            $part = self::create(
                $item->id,
                $item->number,
                $item->name,
                $item->description
            );

            array_push($parts, $part);
        }

        return $parts;
    }
}