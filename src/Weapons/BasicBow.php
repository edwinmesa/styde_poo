<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasicBow
 *
 * @author andredw
 */
namespace Styde\Weapons;
use Styde\Weapons\Bow;
use Styde\Unit;
class BasicBow extends Bow {
    //put your code here
    protected $damage = 20;
     public function getDescription(Unit $attacker, Unit $opponent) {
        return "{$attacker->getName()} dispara una flecha a {$opponent->getName()}";
    }
}
