<?php

namespace App\Consumer;

use App\Consumer\Consumer;
use App\Consumer\ConsumerInterface;

class CreditConsumer  {

    public function __construct(Consumer $consumer)
    {
        $this->consumer = $consumer;
    }


}
