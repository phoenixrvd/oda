<?php

namespace PhoenixRVD\ODA\Interfaces;


interface Method {

    /**
     * Ruft die Accessor-Methode Auf.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function execute(array $attributes);

}