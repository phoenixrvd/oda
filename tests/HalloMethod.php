<?php

namespace PhoenixRVD\ODA;


use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Methods\AbstractMethod;

class HalloMethod extends AbstractMethod {

    public function execute(OdaObject $object) {
        $data = $object->getData();

        return 'Hallo ' . $data[ $this->propertyName ];
    }

    public function getPrefix() {
        return 'hallo';
    }
}