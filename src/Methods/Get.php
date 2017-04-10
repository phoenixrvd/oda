<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert die Getter-Methoden.
 *
 * @example getMyValue
 */
class Get extends AbstractMethod {

    public function execute(array $attributes) {
        $data = $this->object->getData();

        return $data[ $this->propertyName ];
    }
}