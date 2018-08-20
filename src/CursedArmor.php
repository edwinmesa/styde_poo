<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursedArmor
 *
 * @author andredw
 */
class CursedArmor implements Armor {

    public function absorbDamage($damage) {
        return $damage * 2;
    }

}