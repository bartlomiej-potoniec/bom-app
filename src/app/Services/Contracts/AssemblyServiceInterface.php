<?php

namespace App\Services\Contracts;


interface AssemblyServiceInterface
{
    function getAll(): array|\Error;
}