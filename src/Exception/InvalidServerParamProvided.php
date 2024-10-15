<?php declare(strict_types=1);

namespace AlanVdb\Server\Exception;

use AlanVdb\Server\Definition\ServerExceptionInterface;
use InvalidArgumentException;

class InvalidServerParamProvided
    extends InvalidArgumentException
    implements ServerExceptionInterface
{}
