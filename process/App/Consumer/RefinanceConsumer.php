<?php

namespace App\Consumer;

use App\Consumer\Consumer;
use App\Consumer\ConsumerInterface;

class RefinanceConsumer extends Consumer implements ConsumerInterface {

    protected $consumer = null;

    /**
     * CascoConsumer constructor.
     * @param string $queueName
     */
    public function __construct(string $queueName = '')
    {
        parent::__construct($queueName);
    }

    /**
     * @return bool
     */
    public function connectToQueue(): bool
    {
        echo "\n--- Channel connected ---\n";
        $callback = function ($msg) {
            $this->log(json_decode($msg->get('content_type')));
            sleep(2);
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume($this->queue, '', false, false, false, false, $callback);

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
        $this->connectionClose();
    }
}