<?php


namespace App\Factory;


use App\Message\MathOperation;
use App\MessageHandler\MathOperationHandler;
use App\MessageHandler\MessageHandlerInterface;
use App\Services\Calculator;
use App\Services\MathOperationExecutor;
use Exception;

/**
 * Class HandlerFactory
 * @package App\Factory
 */
class HandlerFactory
{
    /**
     *
     */
    const HANDLERS = [
        MathOperation::class => 'createMathOpertaion'
    ];

    /**
     * @param object $message
     * @return MessageHandlerInterface
     * @throws Exception
     */
    public function getForMessage(object $message): MessageHandlerInterface
    {
        $messageClass = get_class($message);
        if (!isset(self::HANDLERS[$messageClass])) {
            throw new Exception('handler for this message is not set');
        }
        $method = self::HANDLERS[$messageClass];
        return $this->{$method}($message);
    }

    /**
     * @param $message
     * @return MessageHandlerInterface
     */
    private function createMathOpertaion($message): MessageHandlerInterface
    {
        $executor = new MathOperationExecutor();
        $calculator = new Calculator($executor);
        return new MathOperationHandler($calculator, $message);
    }
}