<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert die Getter-Methoden.
 *
 * @example getMyValue
 */
class Get extends AbstractMethod {

    public function execute() {
        $data = $this->object->getData();

        return $data[ $this->propertyName ];
    }
}