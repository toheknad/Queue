<?php


namespace App\Consumer;


use GuzzleHttp\Psr7\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Consumer
{
    public $channel = null;
    public $queue = null;
    public $connection = null;

    /**
     * Consumer constructor.
     * @param string $queueName
     */
    public function __construct(string $queueName = '')
    {
        $this->queue = $queueName;
        $this->init();
    }

    /**
     * @return bool
     */
    protected function init(): bool
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        if ($this->channel = $this->connection->channel()) {
            $this->setQueue($this->queue);
            return true;
        };
        return false;
    }

    /**
     * @param string $name
     * @return bool
     */
    protected function setQueue(string $name): bool
    {
        if ($this->channel->queue_declare($name, false, false, false, false)) {
            return true;
        };
        return false;
    }

    public function log($data): bool
    {
        $response = '--- Name: '.$data->name." | ".'LastName: '.$data->lastName." | ".'Phone: '.$data->phone . "\n";
        if (file_put_contents('logs.txt', $response, FILE_APPEND)) {
            return true;
        }
        return false;
    }

    public function connectionClose(): void
    {
        $this->channel->close();
        $this->connection->close();
    }

}