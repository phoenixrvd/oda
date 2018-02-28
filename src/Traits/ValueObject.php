<?php

namespace PhoenixRVD\ODA\Traits;

/**
 * Stellt Standard-Funktionalität zum Setzen und Auslesen der Daten aus einem Wert-Object bereit.
 *
 * Implementiert ein Teil des OdaObject-Interfaces
 */
trait ValueObject
{
    /**
     * Storage für alle Daten des Objektes.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Gibt alle Daten des Objektes zurück.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $property
     * @param mixed  $value
     *
     * @return $this
     */
    public function setDataValue($property, $value)
    {
        $this->data[$property] = $value;

        return $this;
    }
}
