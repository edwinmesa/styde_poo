<?php

/*
 * Lecion 7 de Styde: Composer PS-4
 *  
 */
namespace Styde;
require './src/helpers.php';
require './vendor/Armor.php';

spl_autoload_register(function ($className) {
    if (strpos($className, 'Styde\\') === 0) {
        $className = str_replace('Styde\\', '', $className);
        if (file_exists("src/$className.php")) {
            require "src/$className.php";
        }
//exit($className);
    }
});

$armor = new BronzeArmor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$edwin->attack($sar);
$sar->setArmor(new CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);