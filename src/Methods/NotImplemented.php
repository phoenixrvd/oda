<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Exceptions\NotImplementedException;

/**
 * Implementiert NULL-Object-Patter für die Factory.
 */
class NotImplemented extends AbstractMethod {

    /**
     * Wirft eine Exception, da die Aufgerufen Objekt-Methode gibt es nicht.
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws \PhoenixRVD\ODA\Exceptions\NotImplementedException
     */
    public function execute(array $attributes) {
        throw new NotImplementedException('Class ' . get_class($this->object) . ' has no method ' . $this->methodName);
    }
}