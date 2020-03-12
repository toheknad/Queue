<?php


namespace App\Consumer;

use App\Consumer\CascoConsumer;
use App\Consumer\CreditConsumer;
use App\Consumer\OsagoConsumer;
use App\Consumer\RefinanceConsumer;

class ConsumerFactory
{
    protected $queueList = [
        'casco' => CascoConsumer::class,
        'credit' => CreditConsumer::class,
        'osago' => OsagoConsumer::class,
        'refinance' => RefinanceConsumer::class
    ];

    /**
     * @param $type
     * @return mixed
     */
    public function createConsumer($type, $queue)
    {
        if (isset($this->queueList[$type])) {
            return new $this->queueList[$type]($queue);
        }
    }

}