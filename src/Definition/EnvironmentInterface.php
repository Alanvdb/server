<?php declare(strict_types=1);

namespace AlanVdb\Server\Definition;

interface EnvironmentInterface
{
    public function getVar(string $var, mixed $default = null) : mixed;
}
