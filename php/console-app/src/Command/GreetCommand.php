<?php

namespace ConsoleApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('greet')
            ->addArgument('first_name', InputArgument::REQUIRED, 'What is your first name?')
            ->addArgument('last_name', InputArgument::OPTIONAL, 'What is your last name?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = 'Hi ' . $input->getArgument('first_name');

        $lastName = $input->getArgument('last_name');
        if ($lastName) {
            $text .= ' ' . $lastName;
        }

        $output->writeln($text . '!');
    }
}
