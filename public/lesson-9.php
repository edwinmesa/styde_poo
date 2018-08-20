<?php

/*
 * Lecion 9 de Styde: Patrones de Diseño.
 *
 */
namespace Styde;

require '../vendor/autoload.php';



//$armor = new Armors\BronzeArmor();
$sar = new Soldier('Bestia',new Weapons\BasicSword);
$sar->setArmor(new Armors\BronzeArmor());
$edwin = new Archer('Sar',new Weapons\CrossBow);
$edwin->attack($sar);
$edwin->attack($sar);
$sar->attack($edwin);