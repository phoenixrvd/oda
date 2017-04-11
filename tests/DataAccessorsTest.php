<?php

namespace PhoenixRVD\ODA;

use PHPUnit\Framework\TestCase;

class DataAccessorsTest extends TestCase {

    public function testDefaultMethods() {
        $object = new ExampleObject();

        self::assertInstanceOf(ExampleObject::class, $object->setFoo('bar'));
        self::assertTrue($object->hasFoo());
        self::assertTrue($object->isFoo('bar'));
        self::assertEquals('bar', $object->getFoo());

        self::assertInstanceOf(ExampleObject::class, $object->setFoo('bar1'));
        self::assertEquals('bar1', $object->getFoo());

        self::assertFalse($object->hasBar());
        self::assertFalse($object->isBar('foo'));

        self::assertJson($object->setFoo(['foo' => 'bar'])->asJSONFoo());
        self::assertEquals('null', $object->setFoo(null)->asJSONFoo());
    }

    public function testCustomMethods() {
        $object = new ExampleExtendedObject();

        self::assertEquals('Hallo Word', $object->setFoo('Word')->halloFoo());
    }

    /**
     * @expectedException \PhoenixRVD\ODA\Exceptions\NotImplementedException
     * @expectedExceptionMessage Class PhoenixRVD\ODA\ExampleObject has no method callFooBar
     */
    public function testMethodNotFound() {
        $object = new ExampleObject();
        $object->callFooBar();
    }

    /**
     * @expectedException \PhoenixRVD\ODA\Exceptions\NotImplementedException
     * @expectedExceptionMessage Class PhoenixRVD\ODA\ExampleObject has no method get
     */
    public function testPraefixOnly() {
        $object = new ExampleObject();
        $object->get();
    }

}
