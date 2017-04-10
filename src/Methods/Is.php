<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert die Is-Methoden.
 * Die Prüfung ist Typ-Sicher.
 * D.h.
 *  $this->setValue(true);
 *  $this->isMyValue(true); // True
 *  $this->isMyValue('true'); // False
 *
 * @example isMyValue(true)
 */
class Is extends AbstractMethod {

    public function execute(array $attributes) {
        $data = $this->object->getData();

        return isset($data[ $this->propertyName ]) && ($data[ $this->propertyName ] === $attributes[0]);
    }

}