<?php

namespace ConsoleApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class StyledCommand extends Command
{
    protected function configure()
    {
        $this->setName('styled');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Lorem Ipsum Dolor Sit Amet');

        $io->section('Adding a User');

        $io->text('Lorem ipsum dolor sit amet');

        $io->section('Adding a Group');

        $io->text(array(
            'Lorem ipsum dolor sit amet',
            'Consectetur adipiscing elit',
        ));
        $io->note(array(
            'Lorem ipsum dolor sit amet',
            'Consectetur adipiscing elit',
            'Aenean sit amet arcu vitae sem faucibus porta',
        ));
        $io->newLine();
        #$io->newLine(3);
        $io->listing(array(
            'Element #1 Lorem ipsum dolor sit amet',
            'Element #2 Lorem ipsum dolor sit amet',
            'Element #3 Lorem ipsum dolor sit amet',
        ));
        $io->table(
            array('Header 1', 'Header 2'),
            array(
                array('Cell 1-1', 'Cell 1-2'),
                array('Cell 2-1', 'Cell 2-2'),
                array('Cell 3-1', 'Cell 3-2'),
            )
        );
        $io->note('Lorem ipsum dolor sit amet');
        $io->caution('Lorem ipsum dolor sit amet');
        $io->progressStart(100);
        $io->progressAdvance(10);
        $io->progressFinish();
        $io->newLine();

        $io->ask('What is your name?');
        $io->ask('Where are you from?', 'United States');
        $io->ask('Number of workers to start', 1, function ($number) {
            if (!is_numeric($number)) {
                throw new \RuntimeException('You must type an integer.');
            }

            return $number;
        });
        $io->confirm('Restart the web server?', true);
        $io->choice('Select the queue to analyze', array('queue1', 'queue2', 'queue3'), 'queue1');
        $io->success('Lorem ipsum dolor sit amet');
        $io->warning('Lorem ipsum dolor sit amet');
        $io->error('Lorem ipsum dolor sit amet');

    }
}
