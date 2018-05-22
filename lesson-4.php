<?php

/*
 * Incio de la lesson 04
 * Interacion entre objetos
 */
/*
 * La unidad es algo abstracto, que puede representar muchos objetos
 */

function show($message) {
    echo "<p>{$message}</p>";
}

abstract class Unit {

    protected $alive = true;
    protected $name;
    protected $hp = 40;
    
    public function setHp($points) {
        $this->hp = $points;
        show("{$this->getName()} ahora tiene {$this->hp} puntos de vida");
    }
    public function getHp() {
        return $this->hp;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show("{$this->getName()} camina hacia $direction");
    }

    abstract public function attack(Unit $oponent);

    public function dier() {
        show("{$this->getName()} muere");
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
        show("{$this->getName()} dispara una flecha a {$oponent->getName()}");
        
        $oponent->setHp($oponent->getHp()-$this->damage);
        if($oponent->getHp()<=0){
              $oponent->dier();
        }
      
    }

}

$sair = new Archer('sar');
$edwin = new Soldier('edw');
$edwin->move('Norte');
//$edwin->attack($sair);
$sair->attack($edwin);
$sair->attack($edwin);

/*
 * Fin de lesson -4
 */