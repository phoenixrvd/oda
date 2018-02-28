<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\OdaObject;

/**
 * Gibt den Wert als formatiertes JSON-String zurück
 *
 * @example asJSONMyValue
 */
class AsJSON extends AbstractMethod {

    public function execute(OdaObject $object) {
        $data = $object->getData();

        return json_encode($data[ $this->propertyName ], JSON_PRETTY_PRINT);
    }
}