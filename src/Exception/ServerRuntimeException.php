<?php declare(strict_types=1);

namespace AlanVdb\Server\Exception;

use AlanVdb\Server\Definition\ServerExceptionInterface;
use RuntimeException;

class ServerRuntimeException
    extends RuntimeException
    implements ServerExceptionInterface
{}
