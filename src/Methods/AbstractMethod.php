<?php

namespace PhoenixRVD\ODA\Methods;


use Nayjest\StrCaseConverter\Str;
use PhoenixRVD\ODA\Interfaces\OdaObject;

abstract class AbstractMethod {

    /**
     * @var OdaObject
     */
    protected $object;
    /**
     * @var string
     */
    protected $propertyName;

    public function __construct(OdaObject $object, $methodName) {
        $this->object = $object;

        $methodHandlerName = lcfirst(str_replace(__NAMESPACE__ . "\\", '', get_class($this)));
        if (strpos($methodName, $methodHandlerName) !== 0) {
            return;
        }

        $methodSuffix = str_replace($methodHandlerName, '', $methodName);
        if (empty($methodSuffix)) {
            return;
        }

        $this->propertyName = Str::toSnakeCase($methodSuffix);
    }

    /**
     * Ruft die Accessor-Methode Auf.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    abstract public function execute(array $attributes);

    /**
     * Prüft, ob es ein echtes Händler oder NULL-Händler ist. (Null-Object-Pattern)
     *
     * @return bool
     */
    public function isNullMethod() {
        return false;
    }

    /**
     * Prüft, ob das Objekt für die entsprechende Methode geeignet ist.
     *
     * z.B: das getMyValue wird von Get-Object verarbeitet und setMyValue von Set-Object entsprechend.
     *
     * @return bool
     */
    public function isMatched() {
        return !empty($this->propertyName);
    }

}