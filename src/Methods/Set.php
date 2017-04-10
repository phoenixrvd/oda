<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert die Setter-Methoden.
 *
 * @example setMyValue('foo')
 */
class Set extends AbstractMethod {

    public function execute(array $attributes) {
        $this->object->setDataValue($this->propertyName, $attributes[0]);

        return $this->object;
    }

}