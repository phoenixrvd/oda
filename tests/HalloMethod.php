<?php

namespace PhoenixRVD\ODA;


use PhoenixRVD\ODA\Methods\AbstractMethod;

class HalloMethod extends AbstractMethod {

    public function execute() {
        $data = $this->object->getData();

        return 'Hallo ' . $data[ $this->propertyName ];
    }
}