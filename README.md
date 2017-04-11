# Object Data Accessor (ODA)


[![Build Status](https://travis-ci.org/phoenixrvd/oda.png?branch=master)](https://travis-ci.org/phoenixrvd/oda)
[![Code Climate](https://codeclimate.com/github/phoenixrvd/oda.png)](https://codeclimate.com/github/phoenixrvd/oda)
[![Test Coverage](https://codeclimate.com/github/phoenixrvd/oda/badges/coverage.svg)](https://codeclimate.com/github/phoenixrvd/oda/coverage)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/phoenixrvd/oda/v/stable.svg)](https://packagist.org/packages/phoenixrvd/oda)
[![Latest Unstable Version](https://poser.pugx.org/phoenixrvd/oda/v/unstable.svg)](https://packagist.org/packages/phoenixrvd/oda)
[![License](https://poser.pugx.org/phoenixrvd/oda/license)](https://packagist.org/packages/phoenixrvd/oda)
[![composer.lock](https://poser.pugx.org/phoenixrvd/oda/composerlock)](https://packagist.org/packages/phoenixrvd/oda)

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Features](#features)
- [Installation](#installation)
- [Basics](#basics)
- [IDE-Helper](#ide-helper)
- [Anmerkung](#anmerkung)
- [Testing](#testing)
- [Copyright and license](#copyright-and-license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->


## Features 

* Vereinfacht das Nutzen von Datenhaltungsobjekten.
* Erhöht die Lesbarkeit von Quellcode, durch das Minimieren von LOC.
* Standardisiert DAO-Schicht mit einem kleinem Package, ohne große Frameworks.

## Installation

Bei der Installation ist [Composer](https://getcomposer.org/download/) vorausgesetzt. 

```bash
composer require phoenixrvd/oda
```

## Basics

Angenommen, braucht man ein ein Objekt, welches genau 2 Datenfelder hat (foo und bar).

Deklariert man Standard-Methoden, wird das Objekt wie Folgt aussehen: 

```php
<?php

class MyDataObject {

    private $data = [];
    
    public function getFoo(){
        return $this->data['foo'];
    }
    
    public function setFoo($value){
        $this->data['foo'] = $value;
        return $this;
    }
    
    public function hasFoo(){
        return isset($this->data['foo']);
    }
    
    public function isFoo($value){
        return $this->hasFoo() && $this->data['foo'] === $value;
    }
    
    public function getBar(){
        return $this->data['bar'];
    }
    
    public function setBar($value){
        $this->data['bar'] = $value;
        return $this;
    }
    
    public function hasBar(){
        return isset($this->data['bar']);
    }
    
    public function isBar($value){
        return $this->hasBar() && $this->data['bar'] === $value;
    }

}
```
Hätte man nicht 2 sondern 10 Properties, wird das Object gleich um 300 LOC länger.

Nutzt man das Packet, bekommt man gleiche Funktionalität wesentlich kompakter. Auch wenn anzahl von Datenfelder wächst,
vergrößert man nicht den Code-Basis.

Im Beispiel Unten ist vorheriges Objekt umgeschrieben: 

```php
<?php

use PhoenixRVD\ODA\Interfaces\OdaObject;
use PhoenixRVD\ODA\Traits\DataAccessors;
use PhoenixRVD\ODA\Traits\ValueObject;

class MyDataObject implements OdaObject {

    use ValueObject, DataAccessors;

}
```

## IDE-Helper

Damit die IDE auch alle Objekt-Methoden kennt und man Autovervollständigung nutzen kann, sollte man die Methoden
in der Klasse-Signatur festlegen. 

Es ist aber immer noch kompakter als vorher.

```php
<?php 

/**
 * @method $this  setFoo(mixed $value)
 * @method string getFoo()
 * @method bool   isFoo(mixed $value)
 * @method bool   hasFoo()
 *
 * @method $this  setBar(mixed $value)
 * @method string getBar()
 * @method bool   isBar(mixed $value)
 * @method bool   hasBar()
 */
```

## Anmerkung

Projekte, die auf sehr hohe Leistung ausgelegt sind, sollten auf die Methodik generell verzichten. Diskussion dazu findet man 
[hier](http://stackoverflow.com/questions/3330852/get-set-call-performance-questions-with-php).
  
## Testing

```bash
composer oda:test
```

## Copyright and license

Code released under the [MIT License](LICENSE). 
