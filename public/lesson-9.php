<?php

/*
 * Lecion 9 de Styde: Patrones de Diseño.
 * En esta leccion vamos a seguir refactorizando
 * es posble que se eliminne las clases Soldado y arquero
 *
 */

namespace Styde;

require '../vendor/autoload.php';

//$armor = new Armors\BronzeArmor();
$sar = new Unit('Bestia', new Weapons\BasicSword);
$sar->setArmor(new Armors\SilverArmor());
$edwin = new Unit('Sar', new Weapons\CrossBow);
$edwin->attack($sar);
$edwin->attack($sar);
$sar->attack($edwin);
