<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert die Has-Methoden.
 * Es wird NUR nach Property-Name geprüft. Ist die Property === NULL, bekommt man TRUE zurück.
 *
 * @example hasMyValue
 */
class Has extends AbstractMethod {

    public function execute(array $attributes) {
        $data = $this->object->getData();

        return isset($data[ $this->propertyName ]);
    }

}