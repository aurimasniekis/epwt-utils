<?php

namespace EPWT\UtilsBundle\EventListener;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class CommandSubscriber
 * @package EPWT\UtilsBundle\EventListener
 * @author Aurimas Niekis <aurimas.niekis@gmail.com>
 */
class CommandSubscriber implements EventSubscriberInterface
{
    protected $startTime;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'console.command' => 'consoleCommand',
            'console.terminate' => 'consoleTerminate'
        ];
    }

    /**
     * @param ConsoleCommandEvent $event
     */
    public function consoleCommand(ConsoleCommandEvent $event)
    {
        $this->startTime = microtime(true);
    }

    /**
     * @param ConsoleTerminateEvent $event
     */
    public function consoleTerminate(ConsoleTerminateEvent $event)
    {
        $output = $event->getOutput();

        $output->writeln('');
        $output->writeln(sprintf('<info>Job finished in %.2f s</info>', microtime(true) - $this->startTime));
        $output->writeln(sprintf('<info>Memory usage: %.2f MB</info>', memory_get_peak_usage() >> 20));
    }
}
