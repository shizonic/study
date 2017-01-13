<?php

namespace ConsoleApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MathCommand extends Command
{
    protected function configure()
    {
        $this->setName('math');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $op = $io->choice('Choose the arithmetic operation', ['a' => 'addition', 's' => 'subtraction', 'm' => 'multiplication', 'd' => 'division'], 'addition');

        $n1 = $io->ask('Number one', null, function ($number) {
            if (!is_numeric($number)) {
                throw new \RuntimeException('You must type an integer.');
            }

            return $number;
        });

        $n2 = $io->ask('Number two', null, function ($number) {
            if (!is_numeric($number)) {
                throw new \RuntimeException('You must type an integer.');
            }

            return $number;
        });

        $res = null;
        switch ($op) {
            case 'a': // addition
                $res = $n1 + $n2;
                break;
            case 's': // subtraction
                $res = $n1 + $n2;
                break;
            case 'm': // multiplication
                $res = $n1 * $n2;
                break;
            case 'd': // division
                $res = $n1 / $n2;
                break;
        }

        $io->text('The result is ' . $res . '!');

    }
}
