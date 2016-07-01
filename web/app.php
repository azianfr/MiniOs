<?php

include __DIR__ . '/../vendor/autoload.php';

use Framework\Kernel;

session_start();
$kernel = new Kernel();
$kernel->handle();

if ($kernel->isValid()) {
    $kernel->send();
} else {
    echo $kernel->getError();
}

