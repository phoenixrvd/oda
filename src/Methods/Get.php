<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * Implementiert die Getter-Methoden.
 *
 * @example getMyValue
 */
class Get extends AbstractMethod
{
    public function execute(OdaObject $object)
    {
        $data = $object->getData();

        return $data[$this->propertyName];
    }
}
