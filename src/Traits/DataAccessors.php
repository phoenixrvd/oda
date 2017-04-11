<?php

namespace PhoenixRVD\ODA\Traits;


use PhoenixRVD\ODA\MethodFactory;

/**
 * Stellt Funktionalität zum Dynamischen erzeugen von Data-Accessors, wie Getters und Setters bereit.
 *
 * Implementiert ein Teil des OdaObject-Interfaces
 */
trait DataAccessors {

    public function __call($name, $arguments) {
        /** @noinspection PhpParamsInspection $this ist im Trait nicht bekannt */
        /** @noinspection PhpMethodParametersCountMismatchInspection Optional-Method im Interface-Contract */
        return (new MethodFactory)->makeMethod($this, $name)->execute($arguments);
    }

}