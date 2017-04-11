<?php

namespace PhoenixRVD\ODA;


use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Methods\AbstractMethod;
use PhoenixRVD\ODA\Methods\AsJSON;
use PhoenixRVD\ODA\Methods\Get;
use PhoenixRVD\ODA\Methods\Has;
use PhoenixRVD\ODA\Methods\Is;
use PhoenixRVD\ODA\Methods\NotImplemented;
use PhoenixRVD\ODA\Methods\Set;

/**
 * Wählt Anhand der Methoden-Name entsprechendes Method-Wrapper aus.
 */
class MethodFactory {

    /**
     * Mapping: Method-Präfix zu Händler-Klasse
     *
     * @var array
     */
    private $accessors = [
        'get'    => Get::class,
        'has'    => Has::class,
        'is'     => Is::class,
        'set'    => Set::class,
        'asJSON' => AsJSON::class,
    ];

    /**
     * Fügt ein neues Method-Händler hinzu, bzw. ersetzt ein Vorhandenes.
     *
     * @param string $methodPrefix
     * @param string $accessorClass
     *
     * @return $this
     */
    public function setAccessor($methodPrefix, $accessorClass) {
        $this->accessors[ $methodPrefix ] = $accessorClass;

        return $this;
    }

    /**
     * @param OdaObject $object
     * @param string    $methodName
     *
     * @return AbstractMethod
     */
    public function makeMethod(OdaObject $object, $methodName) {

        foreach ($this->accessors as $methodPrefix => $handlerClassName) {

            // Wenn es kein Passender Händler ist, nichts weiteres tun
            if (strpos($methodName, $methodPrefix) !== 0) {
                continue;
            }

            /** @var AbstractMethod $method */
            $method = new $handlerClassName($methodName, $methodPrefix, $object);
            if ($method->isMatched()) {

                return $method;
            }
        }

        return new NotImplemented($methodName, 'notImplemented', $object);
    }

}