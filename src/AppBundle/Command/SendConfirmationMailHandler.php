<?php

namespace AppBundle\Command;

use Psr\Log\LoggerInterface;

class SendConfirmationMailHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SendConfirmationMail $command)
    {
        $this->logger->info(
            sprintf("Sending mail to userId %s for orderId %s", $command->getUserId(), $command->getOrderId())
        );
    }
}
