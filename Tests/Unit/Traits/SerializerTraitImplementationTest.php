<?php

namespace EPWT\UtilsBundle\Tests\Unit\Traits;

use EPWT\UtilsBundle\Tests\Stubs\SerializerTraitImplementation;

class SerializerTraitImplementationTest extends \PHPUnit_Framework_TestCase
{
    public function testSerializerIgBinary()
    {
        if (!extension_loaded('igbinary')) {
            $this->markTestSkipped('The extension "igbinary" is not available.');
        }

        $serializerTrait = new SerializerTraitImplementation();

        $given = new \stdClass();
        $given->foo = 'bar';

        $expected = igbinary_serialize($given);

        $this->assertEquals($expected, $serializerTrait->phpSerialize($given));
    }

    public function testUnserializerIgBinary()
    {
        if (!extension_loaded('igbinary')) {
            $this->markTestSkipped('The extension "igbinary" is not available.');
        }

        $serializerTrait = new SerializerTraitImplementation();

        $expected = new \stdClass();
        $expected->foo = 'bar';

        $given = igbinary_serialize($expected);

        $this->assertEquals($expected, $serializerTrait->phpUnserialize($given));
    }

    public function testSerialize()
    {
        $serializerTrait = new SerializerTraitImplementation();

        $given = new \stdClass();
        $given->foo = 'bar';

        $expected = serialize($given);

        $this->assertEquals($expected, $serializerTrait->phpSerialize($given, false));
    }

    public function testUnserializer()
    {
        $serializerTrait = new SerializerTraitImplementation();

        $expected = new \stdClass();
        $expected->foo = 'bar';

        $given = serialize($expected);

        $this->assertEquals($expected, $serializerTrait->phpUnserialize($given, false));
    }
}
