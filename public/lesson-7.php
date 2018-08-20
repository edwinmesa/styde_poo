<?php

/*
 * Lecion 7 de Styde: Composer PS-4
 *  Uso del autoload a traves del composer
 * es la autocarga con el estandar PSR-4
 * donde en usamos el namespace y la ruta
 * en el archivo que creamos como composer.jason
 * se ejecuta el composer dump-autoload crea un 
 * archivo en php con las rutas.
 */
namespace Styde;

require '../vendor/autoload.php';



$armor = new Armors\BronzeArmor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$edwin->attack($sar);
$sar->setArmor(new Armors\CursedArmor());
$edwin->attack($sar);
$sar->attack($edwin);