<?php


namespace App\Consumer;

use App\Consumer\CascoConsumer;
use App\Consumer\CreditConsumer;

class ConsumerFactory
{
    protected $queueList = [
        'casco' => CascoConsumer::class,
        'credit' => CreditConsumer::class,
    ];

    /**
     * @param $type
     * @return mixed
     */
    public function createConsumer($type)
    {
        if (isset($this->queueList[$type])) {
            $consumerInit = new Consumer('test_12352');
            return new $this->queueList[$type]($consumerInit);
        }
    }

}