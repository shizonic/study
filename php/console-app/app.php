#!/usr/bin/env php
<?php

ini_set('display_errors', 1);

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use ConsoleApp\Command\GreetCommand;
use ConsoleApp\Command\HelloWorldCommand;
use ConsoleApp\Command\LockableCommand;
use ConsoleApp\Command\MathCommand;

$application = new Application();

// register commands
$application->add(new GreetCommand());
$application->add(new HelloWorldCommand());
$application->add(new LockableCommand());
$application->add(new MathCommand());

$application->run();
