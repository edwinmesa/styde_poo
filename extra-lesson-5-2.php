<?php

/*
 * Incio de la lesson extra 03
 * Herencia: Clase extiende de otra.
 */
/*
 * La unidad es algo abstracto, que puede representar muchos objetos
 */

function show($message) {
    echo "<p>$message</p>";
}

abstract class Unit {

    protected $alive = true;
    protected $name;
    protected $hp = 40;

    public function getName() {
        return $this->name;
    }
    public function setHp($points) {
        $this->hp = $points;
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }
    public function getHp() {
        return $this->hp;
    }
    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $oponent);

    public function dier() {
        show("{$this->name} muere");
    }

}

class Soldier extends Unit {

    public function attack(Unit $oponent) {
        show("{$this->name} corta a $oponent en dos");
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->name} dispara una flecha a {$oponent->getName()}");
        $oponent->setHp($oponent->getHp() - $this->damage);
        if ($oponent->getHp() <= 0) {
            $oponent->dier();
        }
    }

}

$edwin = new Soldier('edw');
$sair = new Archer('sar');
$sair->attack($edwin);
$sair->attack($edwin);

/*
 * Fin de lesson extra -3
 */
