<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * Implementiert die Has-Methoden.
 * Es wird NUR nach Property-Name geprüft. Ist die Property === NULL, bekommt man TRUE zurück.
 *
 * @example hasMyValue
 */
class Has extends AbstractMethod
{
    public function execute(OdaObject $object)
    {
        $data = $object->getData();

        return isset($data[$this->propertyName]);
    }
}
