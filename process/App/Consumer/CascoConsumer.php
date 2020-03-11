<?php

namespace App\Consumer;

use App\Consumer\Consumer;
use App\Consumer\ConsumerInterface;

class CascoConsumer implements ConsumerInterface {

    protected $consumer = null;

    /**
     * CascoConsumer constructor.
     * @param \App\Consumer\Consumer $consumer
     */
    public function __construct(Consumer $consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * @return bool
     */
    public function connectToQueue(): bool
    {
        echo "--- Waiting for messages ---";
        $callback = function ($msg) {
            echo '-- Answer ', $msg->body, "\n --";
            sleep(2);
            echo "--Done --\n";
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $this->consumer->channel->basic_qos(null, 1, null);
        $this->consumer->channel->basic_consume($this->consumer->queue, '', false, false, false, false, $callback);

        while ($this->consumer->channel->is_consuming()) {
            $this->consumer->channel->wait();
        }
        $this->consumer->connectionClose();
    }
}