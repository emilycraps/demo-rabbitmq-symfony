<?php

namespace AppBundle\Middleware;

use Psr\Log\LoggerInterface;
use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;

class LoggingMiddleware implements MessageBusMiddleware
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function handle($message, callable $next)
    {
        $this->logger->info('LoggingMiddleware: Message processed');

        $next($message);
    }
}
