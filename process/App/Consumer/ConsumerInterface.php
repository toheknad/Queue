<?php


namespace App\Consumer;


interface ConsumerInterface
{
    /**
     * @return bool
     */
    public function connectToQueue(): bool;
}