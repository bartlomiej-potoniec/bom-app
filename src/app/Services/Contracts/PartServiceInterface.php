<?php

namespace App\Services\Contracts;


interface PartServiceInterface
{
    function getAll();
    function create(string $number, string $name, ?string $description, ?float $price);
}