<?php

/*
 * Incio de la lesson 03
 * Herencia: Clase extiende de otra.
 */
/*
 * La unidad es algo abstracto, que puede representar muchos objetos
 */

abstract class Unit {

    protected $alive = true;
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        echo "<p>{$this->name} camina hacia $direction</p>";
    }

    abstract public function attack($oponent);
}

class Soldier extends Unit {

    public function attack($oponent) {
        echo "<p>{$this->name} corta a $oponent en dos</p>";
    }

}

class Archer extends Unit {

    public function attack($oponent) {
        echo "<p>{$this->name} dispara una flecha a $oponent</p>";
    }

}

$edwin = new Soldier('Sar');
$edwin->move('Norte');
$edwin->attack('Bestia');

/*
 * Fin de lesson -3
 */