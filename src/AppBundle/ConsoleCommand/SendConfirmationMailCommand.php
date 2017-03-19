<?php

namespace AppBundle\ConsoleCommand;

use AppBundle\Command\SendConfirmationMail;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SendConfirmationMailCommand extends Command
{
    /**
     * @var MessageBus
     */
    private $messageBus;

    public function __construct(MessageBus $messageBus)
    {
        parent::__construct();

        $this->messageBus = $messageBus;
    }

    protected function configure()
    {
        $this
            ->setName('app:send-confirmation-mail')
            ->addOption('user-id', 'u', InputOption::VALUE_REQUIRED, 'Id of the user')
            ->addOption('order-id', 'o', InputOption::VALUE_REQUIRED, 'Id of the order')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $userId = $input->getOption('user-id');
        $orderId = $input->getOption('order-id');

        $this->messageBus->handle(
            new SendConfirmationMail($userId, $orderId)
        );

        $output->writeln(sprintf("Send confirmation mail to user %s for order %s", $userId, $orderId));
    }
}
