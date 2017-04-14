<?php

use Dice\Dice;
use tb\core\Bootstrap;

// autoload
require '../vendor/autoload.php';

// instancio un dice... que será compartido por todos
$dice = new Dice();


$app = new Bootstrap($dice);

$app->run();