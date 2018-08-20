<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unit
 *
 * @author andredw
 */

namespace Styde;

class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;
    protected $armor;
    protected $weapon;

    public function getName() {
        return $this->name;
    }

    public function getHp() {
        return $this->hp;
    }

    public function __construct($name, Weapon $weapon = null) {
        $this->name = $name;
        $this->weapon = $weapon;
    }

    public function setWeapon(Weapon $weapon) {
        $this->weapon = $weapon;
    }

    public function move($direction) {
        show("{$this->name} camina hacia $direction");
    }

    public function attack(Unit $oponent) {
//        if (!$this->weapon) {
//            throw new \Exception("La unidad no tiene aramas");
//        }
        $attack = $this->weapon->createAttack();
        show($attack->getDescription($this, $oponent));
        $oponent->takeDamage($attack);
    }

    public function takeDamage(Attack $attack) {
        $this->hp = $this->hp - $this->absorbDamage($attack->getDamage());
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->name} muere");
        exit();
    }

//    public function absorbDamage($damage) {
//        return $damage;
//    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function absorbDamage($damage) {
        if ($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }

}
