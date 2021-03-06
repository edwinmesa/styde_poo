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
    /*
     * Este metodo se diseña para recibir el daño del oponente
     * Y calcular la vida
     */

    public function takeDamage($damage) {
        $this->setHp($this->hp - $damage);
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->getName()} muere");
    }

}

class Soldier extends Unit {

    protected $damage = 40;

    public function attack(Unit $oponent) {
        show("{$this->name} corta a {$oponent->getName()} en dos");
        $oponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        return parent::takeDamage($damage / 2);
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->getName()} dispara una flecha a {$oponent->getName()}");
        /*
         * La programacion estructurada nos obliga  a programar y tal vez buscar'
         * desde otra fuente informacion para tomar decisiones.
         * La programacion orientada a objetos a traves del principio
         * tell don't ask donde no pedimos informacion desde otras fuentes
         * sino tomamos decisiones en el codigo interno o atraves de un comando
         * indicandole que hacer. 
         */

        /*
         * Forma antigua
         */
//        if ($oponent instanceof Soldier) {
//            $damage = $this->damage / 2;
//        } else {
//            $damage = $this->damage;
//        }
        /*
         * Forma Correcta
         */
        $oponent->takeDamage($this->damage);
//
//        $oponent->setHp($oponent->getHp() - $damage);
//        if ($oponent->getHp() <= 0) {
//            $oponent->dier();
//        }
    }
    public function takeDamage($damage) {
        if(rand(0,1)==1){
            return parent::takeDamage($damage);
        }
    }

}

$sair = new Archer('sar');
$edwin = new Soldier('edw');
$edwin->move('Norte');
//$edwin->attack($sair);
$sair->attack($edwin);
$sair->attack($edwin);

$edwin->attack($sair);

/*
 * Fin de lesson -4
 */