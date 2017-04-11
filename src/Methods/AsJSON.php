<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Gibt den Wert als formatiertes JSON-String zurück
 *
 * @example asJSONMyValue
 */
class AsJSON extends AbstractMethod {

    public function execute() {
        $data = $this->object->getData();

        return json_encode($data[ $this->propertyName ], JSON_PRETTY_PRINT);
    }
}