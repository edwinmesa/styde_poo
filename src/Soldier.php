<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Soldier
 *
 * @author andredw
 */
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