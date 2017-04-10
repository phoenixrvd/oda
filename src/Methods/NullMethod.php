<?php

namespace PhoenixRVD\ODA\Methods;

/**
 * Implementiert NULL-Object-Patter für die Factory.
 */
class NullMethod extends AbstractMethod {

    /**
     * @codeCoverageIgnore
     */
    public function execute(array $attributes) {
    }

    public function isNullMethod() {
        return true;
    }

}