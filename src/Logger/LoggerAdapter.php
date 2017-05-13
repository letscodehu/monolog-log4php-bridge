<?php

namespace Letscodehu\Logger;


use Psr\Log\LoggerInterface;

/**
 * Adapter class for wrapping Apache loggers to a PSR compliant Logger.
 * @author Krisztian Papp
 */
class LoggerAdapter implements LoggerInterface {

    /**
     * @var \Logger
     */
    private $logger;

    function __construct(\Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
        $this->logger->fatal($this->formatWithContext($message, $context));
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function alert($message, array $context = array())
    {
        $this->logger->fatal($this->formatWithContext($message, $context));
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function critical($message, array $context = array())
    {
        $this->logger->fatal($this->formatWithContext($message, $context));
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function error($message, array $context = array())
    {
        $this->logger->error($this->formatWithContext($message, $context));
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function warning($message, array $context = array())
    {
        $this->logger->warn($this->formatWithContext($message, $context));
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function notice($message, array $context = array())
    {
        $this->logger->trace($this->formatWithContext($message, $context));
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function info($message, array $context = array())
    {
        $this->logger->info($this->formatWithContext($message, $context));
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function debug($message, array $context = array())
    {
        $this->logger->debug($this->formatWithContext($message, $context));
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $this->logger->log($level, $this->formatWithContext($message,$context));
    }

    /**
     * Formats the log message with context
     * @param $message
     * @param array $context
     * @return string
     */
    private function formatWithContext($message, array $context)
    {
        if (empty($context)) {
            $formatted = $message;
        } else {
            $formatted = sprintf("%s %s", $message, json_encode($context));
        }
        return $formatted;
    }

}