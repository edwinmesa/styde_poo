<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function show($message) {
    echo "<p>{$message}</p>";
}

abstract class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;

    public function getName() {
        return $this->name;
    }
    /*
     * Este metodo define los puntos de vida y muestra los puntos
     * Si tiene ataques o con los iniciales
     */
    private function setHp($points) {
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

    public function takeDamage($damage) {
        $this->setHp($this->hp - $damage);
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->name} muere");
    }

}

class Soldier extends Unit {

    protected $damage = 40;
    protected $armor;
    public function __construct($name, $armor = 2) {
        $this->armor = $armor;
        return parent::__construct($name);
    }
    public function attack(Unit $oponent) {
        show("{$this->name} ataca con la espada a  {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        return parent::takeDamage($damage / $this->armor);
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->name} dispara una flecha a {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        if (rand(0, 1) == 1) {
            return parent::takeDamage($damage);
        }
    }

}

$sar = new Soldier('Bestia',3);
$edwin = new Archer('Sar');
$edwin->getHp();
//$edwin->move('Norte');
$edwin->attack($sar);
$edwin->attack($sar);
$sar->attack($edwin);
