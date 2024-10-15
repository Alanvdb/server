<?php declare(strict_types=1);

namespace AlanVdb\Server;

use AlanVdb\Server\Definition\EnvironmentInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Dotenv\Dotenv;
use AlanVdb\Server\Exception\InvalidServerParamProvided;
use AlanVdb\Server\Exception\ServerRuntimeException;
use Dotenv\Exception\ExceptionInterface as DotenvExceptionInterface;

class Environment implements EnvironmentInterface
{
    protected string $root;
    protected ServerRequestInterface $request;

    public function __construct(string $rootDirectory)
    {
        if (!is_dir($rootDirectory)) {
            throw new InvalidServerParamProvided("Provided root directory is not valid: '$rootDirectory'.");
        }
        $this->root = $rootDirectory;
        
        try {
            Dotenv::createImmutable($this->root)->load();
        } catch (DotenvExceptionInterface $e) {
            throw new ServerRuntimeException("Exception catched from DotEnv library with message: '$e->getMessage()'.");
        }
    }

    public function get(string $var) : mixed
    {
        if (array_key_exists($var, $_ENV)) {
            return $_ENV[$var];
        } elseif ($var === 'ROOT') {
            return $this->root;
        }
        throw new ServerRuntimeException("Environment variable not found: '$var'.");
    }

    public function has(string $var) : bool
    {
        return array_key_exists($var, $_ENV) || $var === 'ROOT';
    }
}
