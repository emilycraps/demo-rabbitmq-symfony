<?php

namespace AppBundle\Command;

class SendConfirmationMail
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $orderId;

    /**
     * @param int $userId
     * @param int $orderId
     */
    public function __construct(int $userId, int $orderId)
    {
        $this->userId = $userId;
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
