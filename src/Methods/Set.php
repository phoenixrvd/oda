<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * Implementiert die Setter-Methoden.
 *
 * @example setMyValue('foo')
 */
class Set extends AbstractMethod {

    public function execute(OdaObject $object, array $attributes = array()) {

        return $object->setDataValue($this->propertyName, $attributes[0]);
    }

}