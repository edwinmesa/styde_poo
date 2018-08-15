<?php

/*
 * Lecion 6 de Styde 
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
        $this->hp = $this->hp - $this->absorbDamage($damage);
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->name} muere");
        exit();
    }

    public function absorbDamage($damage) {
        return $damage;
    }

}

class Soldier extends Unit {

    protected $damage = 40;
    protected $armor;

    public function __construct($name) {
        return parent::__construct($name);
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function attack(Unit $oponent) {
        show("{$this->name} ataca con la espada a  {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    public function absorbDamage($damage) {
        if ($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->name} dispara una flecha a {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

}

interface Armor {

    public function absorbDamage($damage);
}

class BronzeArmor implements Armor {

    public function absorbDamage($damage) {
        return $damage / 2;
    }

}

class SilverArmor implements Armor {

    public function absorbDamage($damage) {
        return $damage / 3;
    }

}

class CursedArmor implements Armor {

    public function absorbDamage($damage) {
        return $damage * 2;
    }

}

$armor = new BronzeArmor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$edwin->attack($sar);
$sar->setArmor(new CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);
