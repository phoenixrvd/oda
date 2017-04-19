<?php

namespace PhoenixRVD\ODA\Methods;


use Nayjest\StrCaseConverter\Str;
use PhoenixRVD\ODA\Interfaces\Method;
use PhoenixRVD\ODA\Interfaces\OdaObject;

abstract class AbstractMethod implements Method {

    /**
     * Mapping Method zu Property-Name
     *
     * @var string[]
     */
    protected static $methodToPropertyMap = [];
    /**
     * @var OdaObject
     */
    protected $object;
    /**
     * @var string
     */
    protected $propertyName;
    /**
     * @var string
     */
    protected $methodName;

    public function __construct($methodName, $handlerPrefix) {
        $this->methodName = $methodName;

        if (isset(static::$methodToPropertyMap[ $methodName ])) {
            $this->propertyName = static::$methodToPropertyMap[ $methodName ];

            return;
        }

        $methodSuffix = substr_replace($methodName, '', 0, strlen($handlerPrefix));
        if (empty($methodSuffix)) {
            return;
        }

        static::$methodToPropertyMap[ $methodName ] = Str::toSnakeCase($methodSuffix);
        $this->propertyName = static::$methodToPropertyMap[ $methodName ];
    }

    public function setObject(OdaObject $object) {
        $this->object = $object;

        return $this;
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