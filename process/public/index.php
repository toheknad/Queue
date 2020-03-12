<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use App\Consumer\Consumer;
use App\Consumer\CascoConsumer;
use App\Producer\Producer;
use App\Consumer\ConsumerFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

switch ($_SERVER['argv'][1]){
    case 'producer':
        $producer = new Producer($_SERVER['argv'][2]);
        $producer->generateLead();
        break;
    case 'producer-test':
        $producer = new Producer($_SERVER['argv'][2]);
        $producer->addMessageToQueue('test', ['name' => '3123']);
        break;
    case 'consumer':
            $consumer = (new ConsumerFactory())->createConsumer($_SERVER['argv'][2], $_SERVER['argv'][3]);
            $consumer->connectToQueue();

        break;
    default:
        echo 'Something gone wrong!';
};