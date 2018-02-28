<?php

namespace PhoenixRVD\ODA;

use PhoenixRVD\ODA\Methods\Is;
use PhoenixRVD\ODA\Methods\Get;
use PhoenixRVD\ODA\Methods\Has;
use PhoenixRVD\ODA\Methods\Set;
use PhoenixRVD\ODA\Methods\AsJSON;
use PhoenixRVD\ODA\Methods\AbstractMethod;
use PhoenixRVD\ODA\Exceptions\NotImplementedException;

/**
 * Wählt Anhand der Methoden-Name entsprechendes Method-Wrapper aus.
 */
class MethodFactory
{
    /**
     * Mapping: Method-Präfix zu Händler-Klasse.
     *
     * @var AbstractMethod[]
     */
    private static $accessors = [];

    /**
     * @var self
     */
    private static $instance = null;

    /**
     * @param AbstractMethod[] $accessors
     *
     * @throws \ReflectionException
     */
    public function __construct($accessors)
    {
        foreach ($accessors as $accessor) {
            $this->setAccessor($accessor);
        }
    }

    /**
     * @return MethodFactory
     * @throws \ReflectionException
     */
    public static function getInstance()
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        self::$instance = new static([
            new Get,
            new Has,
            new Is,
            new Set,
            new AsJSON,
        ]);

        return self::$instance;
    }

    /**
     * Fügt ein neues Method-Händler hinzu, bzw. ersetzt ein Vorhandenes.
     *
     * @param AbstractMethod $method
     *
     * @return $this
     * @throws \ReflectionException
     */
    public function setAccessor(AbstractMethod $method)
    {
        self::$accessors[$method->getPrefix()] = $method;

        return $this;
    }

    /**
     * @param string $methodName
     *
     * @return AbstractMethod
     */
    public function makeMethod($methodName)
    {
        foreach (self::$accessors as $methodPrefix => $handler) {
            $propertyName = $this->extractPropertyName($methodPrefix, $methodName);

            if (! empty($propertyName)) {
                return $handler->setPropertyName($propertyName);
            }
        }

        throw new NotImplementedException("Method not implemented [$methodName]");
    }

    private function extractPropertyName($methodPrefix, $methodName)
    {
        if (strpos($methodName, $methodPrefix) !== 0) {
            return '';
        }

        $methodSuffix = str_replace($methodPrefix, '', $methodName);
        if (empty($methodSuffix)) {
            return '';
        }

        // @source https://stackoverflow.com/questions/1993721/how-to-convert-camelcase-to-camel-case
        return ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $methodSuffix)), '_');
    }
}
