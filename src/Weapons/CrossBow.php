<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde\Weapons;

/**
 * Description of CrossBow
 *
 * @author andredw
 */
namespace Styde\Weapons;
use Styde\Weapons\Bow;
use Styde\Unit;
class CrossBow extends Bow {
    //put your code here
    protected $damage = 40;
    public function getDescription(Unit $attacker, Unit $opponent) {
        return "{$attacker->getName()} ataca con la espada a {$opponent->getName()}";
    }

}