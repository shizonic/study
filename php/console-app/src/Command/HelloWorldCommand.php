<?php

namespace ConsoleApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('helloworld')
            // the short description shown while running "php bin/console list"
            ->setDescription('Say hello to the world')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("This command says hello to the world");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello World');
    }
}