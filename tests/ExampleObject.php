<?php

namespace PhoenixRVD\ODA;


use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Traits\DataAccessors;
use PhoenixRVD\ODA\Traits\ValueObject;

/**
 * @method $this setFoo(string $value)
 * @method string getFoo()
 * @method bool isFoo(string $value)
 * @method bool hasFoo()
 *
 * @method $this setBar(string $value)
 * @method string getBar()
 * @method bool isBar(string $value)
 * @method bool hasBar()
 */
class ExampleObject implements OdaObject {

    use ValueObject, DataAccessors;

}
