<?php

namespace PhoenixRVD\ODA\Traits;


use PhoenixRVD\ODA\Exceptions\NotImplementedException;
use PhoenixRVD\ODA\MethodFactory;

/**
 * Stellt Funktionalität zum Dynamischen erzeugen von Data-Accessors, wie Getters und Setters bereit.
 *
 * Implementiert ein Teil des OdaObject-Interfaces
 */
trait DataAccessors {

    public function __call($name, $arguments) {
        /** @noinspection PhpParamsInspection $this ist im Trait nicht bekannt */
        $method = (new MethodFactory)->makeMethod($this, $name);

        if ($method->isNullMethod()) {
            throw new NotImplementedException('Class ' . get_class($this) . " has no method $name");
        }

        return $method->execute($arguments);
    }

}