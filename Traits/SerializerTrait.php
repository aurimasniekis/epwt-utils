<?php

namespace EPWT\UtilsBundle\Traits;

/**
 * Trait SerializerTrait
 * @package EPWT\UtilsBundle\Traits
 * @author Aurimas Niekis <aurimas.niekis@gmail.com>
 */
trait SerializerTrait
{
    /**
     * @param mixed $value Value to serialize
     * @param bool $igBinary Try to use advanced igbinary serializer if possible
     *
     * @return string
     */
    public function phpSerialize($value, $igBinary = true)
    {
        if ($igBinary && function_exists('igbinary_serialize')) {
            return igbinary_serialize($value);
        }

        return serialize($value);
    }

    /**
     * @param $value
     * @param bool $igBinary
     *
     * @return mixed
     */
    public function phpUnserialize($value, $igBinary = true)
    {
        if ($igBinary && function_exists('igbinary_unserialize')) {
            return igbinary_unserialize($value);
        }

        return unserialize($value);
    }
}
