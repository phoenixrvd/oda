<?php

namespace PhoenixRVD\ODA\Interfaces;

interface OdaObject
{
    /**
     * Gibt Array mit allen Daten des Objects zurück.
     *
     * @return array
     */
    public function getData();

    /**
     * Setzt eine Object-Property.
     *
     * @param string $property
     * @param mixed  $value
     *
     * @return $this
     */
    public function setDataValue($property, $value);

    public function __call($name, $arguments);
}
