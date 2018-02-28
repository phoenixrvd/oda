<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * Implementiert die Is-Methoden.
 * Die Prüfung ist Typ-Sicher.
 * D.h.
 *  $this->setValue(true);
 *  $this->isMyValue(true); // True
 *  $this->isMyValue('true'); // False.
 *
 * @example isMyValue(true)
 */
class Is extends AbstractMethod
{
    public function execute(OdaObject $object, $attributes = [])
    {
        $data = $object->getData();

        return isset($data[$this->propertyName]) && ($data[$this->propertyName] === $attributes[0]);
    }
}
