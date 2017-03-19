<?php

namespace AppBundle\Command;

use JMS\Serializer\Annotation\Type;

class SendConfirmationMail
{
    /**
     * @var int
     * @Type("integer")
     */
    private $userId;
    /**
     * @var int
     * @Type("integer")
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
