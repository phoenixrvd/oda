<?php

namespace PhoenixRVD\ODA\Interfaces;


interface Method {

    /**
     * Ruft die Accessor-Methode Auf.
     *
     * @param OdaObject $object
     * @param array     $attributes (optional)
     *
     * @return mixed
     */
    public function execute(OdaObject $object);

}