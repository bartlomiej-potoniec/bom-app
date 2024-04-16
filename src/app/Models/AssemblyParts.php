<?php

namespace App\Models;

use App\Models\Part;
use App\Models\Assembly;


final class AssemblyParts
{
    private Assembly $assembly;

    /**
     * @var Part[]
     */
    private array $parts;

    /**
     * @param Assembly
     * @param Part[]
     */
    private function __construct(Assembly $assembly, array $parts)
    {
        $this->assembly = $assembly;
        $this->parts = $parts;
    }

    # Getters
    public function getAssembly(): Assembly
    {
        return $this->assembly;
    }

    /**
     * @return Part[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    # Factory methods
    public static function create(
        object $assembly,
        array $parts,
    ): self {
        $assemblyResult = Assembly::create($assembly);
        $partsResult = Part::createSet($parts);

        return new self($assemblyResult, $partsResult);
    }
}