<?php

namespace ConsoleApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LockableCommand extends Command
{
    use LockableTrait;

    protected function configure()
    {
        $this->setName('lockable');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return 0;
        }

        $progress = new ProgressBar($output, 50);
        $progress->start();

        $i = 0;
        while ($i++ < 50) {
            usleep(200000);
            $progress->advance();
        }
        $progress->finish();

        $this->release();
    }
}
