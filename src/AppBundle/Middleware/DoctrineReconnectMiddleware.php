<?php

namespace AppBundle\Middleware;

use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;
use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;

class DoctrineReconnectMiddleware implements MessageBusMiddleware
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var LoggerInterface
     */
    private $logger;


    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function handle($message, callable $next)
    {
        /*try {
            if ($this->connection->ping() === false) {
                $this->connection->close();
                $this->connection->connect();
            }
        } catch (\Exception $e) {
            $this->logger->critical(
                sprintf("%s: %s (in %s)", get_class($e), $e->getMessage(), get_class()),
                (array) $message
            );
        }*/

        $this->logger->info('DoctrineReconnectMiddleware: Reconnected to database');

        $next($message);
    }
}
