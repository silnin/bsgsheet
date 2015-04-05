<?php

//require_once __DIR__.'/bootstrap.php.cache';
require_once __DIR__.'/AppKernel.php';

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Input\ArrayInput;

//use Symfony\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand;
//use Symfony\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand;

$kernel = new AppKernel('test', true); // create a "test" kernel
$kernel->boot();

$application = new Application($kernel);