<?php declare(strict_types=1);

namespace AlanVdb\Server\Definition;

interface EnvironmentInterface
{
    public function get(string $var) : mixed;

    public function has(string $var) : bool;
}
