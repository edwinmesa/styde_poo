<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Archer
 *
 * @author andredw
 */
namespace Styde;
class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->name} dispara una flecha a {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

}