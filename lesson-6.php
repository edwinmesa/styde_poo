<?php

/*
 * Lecion 6 de Styde 
 */

function show($message) {
    echo "<p>{$message}</p>";
}
require './src/Unit.php';
require './src/Soldier.php';
require './src/Archer.php';
require './src/Armor.php';
require './src/BronzeArmor.php';
require './src/SilverArmor.php';
require './src/CursedArmor.php';

$armor = new BronzeArmor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$edwin->attack($sar);
$sar->setArmor(new CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);
