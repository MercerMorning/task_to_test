<?php


namespace App\Message;


/**
 * Interface MessageInterface
 * @package App\Message
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function getQueueName(): string;

    public function getString(): string;
}