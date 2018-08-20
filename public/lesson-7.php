<?php

/*
 * Lecion 7 de Styde: Composer PS-4
 *  
 */
namespace Styde;
require '../src/helpers.php';
require '../vendor/autoload.php';



$armor = new BronzeArmor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$edwin->attack($sar);
$sar->setArmor(new CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);