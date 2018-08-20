<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BronzeArmor
 *
 * @author andredw
 */
namespace Styde;

class BronzeArmor implements Armor {

    public function absorbDamage($damage) {
        return $damage / 2;
    }

}