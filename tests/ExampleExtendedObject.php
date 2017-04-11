<?php

namespace PhoenixRVD\ODA;

use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Traits\ValueObject;

/**
 * @method $this setFoo(string $value)
 * @method string halloFoo()
 */
class ExampleExtendedObject implements OdaObject {

    use ValueObject;

    public function __call($name, $arguments) {

        /** @noinspection PhpParamsInspection $this ist im Trait nicht bekannt */
        return (new MethodFactory)
            ->setAccessor('hallo', HalloMethod::class)
            ->makeMethod($this, $name)
            ->execute($arguments);
    }

}