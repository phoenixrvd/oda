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
        $methods = [
            Get::class,
            Has::class,
            Is::class,
            Set::class,
        ];

        foreach ($methods as $methodClassName) {
            /** @var AbstractMethod $method */
            $method = new $methodClassName($object, $methodName);
            if ($method->isMatched()) {
                return $method;
            }
        }

        return new NullMethod($object, $methodName);
    }

}