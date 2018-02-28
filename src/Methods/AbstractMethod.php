<?php

namespace PhoenixRVD\ODA\Methods;

use PhoenixRVD\ODA\Interfaces\Method;

abstract class AbstractMethod implements Method
{
    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @return string
     * @throws \ReflectionException Wir nie geworfen, da $this ist nie NULL
     */
    public function getPrefix()
    {
        $reflection = new \ReflectionClass($this);
        $className = $reflection->getShortName();

        return lcfirst($className);
    }

    /**
     * @param string $propertyName
     *
     * @return AbstractMethod
     */
    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;

        return $this;
    }
}
