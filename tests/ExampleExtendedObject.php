<?php

namespace PhoenixRVD\ODA;

use PhoenixRVD\ODA\Traits\ValueObject;
use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * @method $this setFoo(string $value)
 * @method string halloFoo()
 */
class ExampleExtendedObject implements OdaObject
{
    use ValueObject;

    public function __construct()
    {
        MethodFactory::getInstance()->setAccessor(new HalloMethod);
    }

    public function __call($name, $arguments)
    {

        /* @noinspection PhpParamsInspection $this ist im Trait nicht bekannt */
        return MethodFactory::getInstance()
            ->makeMethod($name)
            ->execute($this, $arguments);
    }
}
