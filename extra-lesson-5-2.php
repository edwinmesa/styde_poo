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

//    private function setHp($points) {
//        $this->hp = $points;
//        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
//    }

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
    /*
     * Metodo de la clase Unit y el que realiza el daño al oponente
     * este metodo recibe el daño que el atacante tiene y resta de
     * asignado. Si el oponente llega a 0 puntos muere y termina
     * el juego
     */

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

    /*
     * El SetArmor establece la armadura para el soldado
     */

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    /*
     * Este metodo attack infringe el daño al oponente
     */

    public function attack(Unit $oponent) {
        show("{$this->name} ataca con la espada a  {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    /*
     * Este metodo recibe el daño pero tiene algo especial
     * valida si el soldado tiene armadura en caso de tener
     * el recibe el daño con el absorbdamage a la mitad.
     */

//    public function takeDamage($damage) {
//        $damage = $this->absorbDamage($damage);
//        
//        return parent::takeDamage($damage);
//    }

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

    /*
     * El arquero recibe el daño pero a veces lo puede
     * esquivar.
     */
//    public function takeDamage($damage) {
//        if (rand(0, 1) == 1) {
//            return parent::takeDamage($damage);
//        }
//    }
}

/*
 * Una interfaz no tiene logica
 */

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
$edwin->getHp();
//$edwin->move('Norte');
$edwin->attack($sar);
$sar->setArmor(new CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);
