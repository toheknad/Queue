<?php

namespace App\Producer;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Producer
{
    public $channel = null;
    public $exchange = null;
    public $exchangeType = null;
    public $queue = null;
    public $route = null;
    public $connection = null;

    /**
     * Producer constructor.
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
        echo $this->exchange;
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

    /**
     * @param $msg
     * @param $args
     * @return bool
     */
    public function addMessageToQueue($msg, $args): bool
    {
        $msg = new AMQPMessage($msg, ['content_type' => json_encode($args)]);
        $this->channel->basic_publish($msg, '', $this->queue);
        $this->connectionClose();
        return true;
    }

    protected function connectionClose(): void
    {
        $this->channel->close();
        $this->connection->close();
    }

    /**
     * @return string
     */
    public function generateLead(): string
    {
        $names = ['Василий', 'Вячеслав', 'Eвгений', 'Андрей', 'Сергей', 'Валентин'];
        $lastNames = ['Петров', 'Иванов', 'Шеховцов', 'Агеенко'];
        $phones = ['+79064796588', '+79614727523', '+7564274104'];
        for( $i = 0; $i < 2500; $i++) {
            $msg = new AMQPMessage('Заявка', [
                'content_type' => json_encode(
                [
                    'name' => $names[rand(0,count($names)-1)],
                    'lastName' => $names[rand(0,count($lastNames)-1)],
                    'phone' => $names[rand(0,count($phones)-1)],
                ]
            )]);
            $this->channel->basic_publish($msg, '', $this->queue);
        }
        $this->connectionClose();
        echo 'Lead generated succesufully!';
        return true;
    }

}