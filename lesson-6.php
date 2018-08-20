<?php

/*
 * Lecion 6 de Styde 
 * Vamos a usar la autocarga de clases con 
 * la funcion de PHP, se separa el codigo a 
 * una carpeta llamada SRC. Tambien se usa los
 * nombres de espacio. Con el prefijo namespace
 * para identificar cada clase.
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
