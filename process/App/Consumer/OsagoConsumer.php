<?php

namespace Consumer;
use PhpAmqpLib\Connection\AMQPStreamConnection;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->exchange_declare('ex_lead', 'direct', false, false, false);

$channel->queue_declare("lead_casco", false, false, false, false);

$type = ['osago','credit'];
$severities = ['osago'];
if (empty($severities)) {
    file_put_contents('php://stderr', "Usage: $argv[0] [info] [warning] [error]\n");
    exit(1);
}

foreach ($severities as $severity) {
    $channel->queue_bind('lead', 'ex_lead', $severity);
}

echo " [*] Waiting for logs. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
    sleep(3);
};

$channel->basic_consume('lead', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();