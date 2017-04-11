<?php

namespace PhoenixRVD\ODA;


use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Methods\AbstractMethod;
use PhoenixRVD\ODA\Methods\Get;
use PhoenixRVD\ODA\Methods\Has;
use PhoenixRVD\ODA\Methods\Is;
use PhoenixRVD\ODA\Methods\NullMethod;
use PhoenixRVD\ODA\Methods\Set;

/**
 * Wählt Anhand der Methoden-Name entsprechendes Method-Wrapper aus.
 */
class MethodFactory {

    /**
     * @param OdaObject $object
     * @param string    $methodName
     *
     * @return AbstractMethod|NullMethod
     */
    public static function makeMethod($object, $methodName) {

        // Mapping: Method-Präfix zu Händler-Klasse
        $methods = [
            'get' => Get::class,
            'has' => Has::class,
            'is'  => Is::class,
            'set' => Set::class,
        ];

        foreach ($methods as $methodPrefix => $handlerClassName) {

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

        return new NullMethod();
    }

}