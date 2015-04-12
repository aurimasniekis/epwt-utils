<?php

namespace EPWT\UtilsBundle\Traits;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Trait OutputFormattedTrait
 * @package EPWT\UtilsBundle\Traits
 * @author Aurimas Niekis <aurimas.niekis@gmail.com>
 */
trait OutputFormattedTrait
{
    /**
     * @var OutputInterface
     */
    protected $output;

    public function writeLn()
    {
        $args = func_get_args();

        $this->output->writeln(call_user_func_array('sprintf', $args));
    }
}
