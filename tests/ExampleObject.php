<?php

namespace PhoenixRVD\ODA;

use PhoenixRVD\ODA\Traits\ValueObject;
use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Traits\DataAccessors;

/**
 * @method $this setFoo(string $value)
 * @method string getFoo()
 * @method bool isFoo(string $value)
 * @method bool hasFoo()
 * @method string asJSONFoo() Gibt das Value als JSON-String zurück
 *
 * @method $this setBar(string $value)
 * @method string getBar()
 * @method bool isBar(string $value)
 * @method bool hasBar()
 */
class ExampleObject implements OdaObject
{
    use ValueObject, DataAccessors;

    public function setValue($data)
    {
        return $this->setDataValue('value', $data);
    }

    public function getValue()
    {
        return $this->getData()['value'];
    }
}
