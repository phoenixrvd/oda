<?php

namespace PhoenixRVD\ODA\Interfaces;


interface Method {

    /**
     * Ruft die Accessor-Methode Auf.
     *
     * @param array $attributes (optional)
     *
     * @return mixed
     */
    public function execute();

}