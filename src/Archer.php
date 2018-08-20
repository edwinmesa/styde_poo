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
use Styde\Weapons\Bow;
class Archer extends Unit {
    public function __construct($name, Bow $bow) {
        parent::__construct($name,$bow);
    }
}