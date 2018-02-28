<?php

namespace PhoenixRVD\ODA;

use PHPUnit\Framework\TestCase;

class DataAccessorsTest extends TestCase
{
    private $rwOperationsCount = 5000;

    public function testDefaultMethods()
    {
        $object = new ExampleObject();

        self::assertInstanceOf(ExampleObject::class, $object->setFoo('bar'));
        self::assertTrue($object->hasFoo());
        self::assertTrue($object->isFoo('bar'));
        self::assertEquals('bar', $object->getFoo());

        self::assertInstanceOf(ExampleObject::class, $object->setFooBAR('bar1'));
        self::assertEquals('bar1', $object->getFooBAR());

        self::assertFalse($object->hasBar());
        self::assertFalse($object->isBar('foo'));

        self::assertJson($object->setFoo(['foo' => 'bar'])->asJSONFoo());
        self::assertEquals('null', $object->setFoo(null)->asJSONFoo());
    }

    public function testPerformanceDifference()
    {
        $object = new ExampleObject();
        $rwOperations = 1000;

        $timeStatic = $this->runRwOperations($rwOperations, function () use ($object) {
            $object->setValue('bar');
            $object->getValue();
        });

        $timeDynamic = $this->runRwOperations($rwOperations, function () use ($object) {
            $object->setFoo('bar');
            $object->getFoo();
        });

        $diffCurrent = ($timeDynamic / $timeStatic);
        $diffAccepted = 5;
        $message = "Max. Time difference to classic calls is to big (Currently: $diffCurrent Accepted: $diffAccepted)";
        self::assertTrue(($diffCurrent < $diffAccepted), $message);
    }

    private function runRwOperations($rwOperations, $handler)
    {
        $i = $rwOperations;

        $curTime = microtime(true);
        while ($i-- > 0) {
            $handler();
        }

        return round(microtime(true) - $curTime, 3) * 1000;
    }

    public function testCustomMethods()
    {
        $object = new ExampleExtendedObject();

        self::assertEquals('Hallo Word', $object->setFoo('Word')->halloFoo());
    }

    /**
     * @expectedException \PhoenixRVD\ODA\Exceptions\NotImplementedException
     * @expectedExceptionMessage Method not implemented [callFooBar]
     */
    public function testMethodNotFound()
    {
        $object = new ExampleObject();
        $object->callFooBar();
    }

    /**
     * @expectedException \PhoenixRVD\ODA\Exceptions\NotImplementedException
     * @expectedExceptionMessage Method not implemented [get]
     */
    public function testPraefixOnly()
    {
        $object = new ExampleObject();
        $object->get();
    }
}
