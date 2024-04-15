<?php

namespace App\Services\Contracts;

use Error;


interface AssemblyServiceInterface
{
    function getAll(): array|Error;
}