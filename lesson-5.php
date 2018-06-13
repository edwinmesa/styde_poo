
<?php

/*
 * Incio de la lesson 05
 * Interfaces y Polimorfismo
 */
/*
 * La unidad es algo abstracto, que puede representar muchos objetos
 */

function show($message) {
    echo "<p>{$message}</p>";
}

abstract class Unit {

    protected $alive = true;
    protected $name;
    protected $hp = 40;

//    public function setHp($points) {
//        $this->hp = $points;
//        show("{$this->getName()} ahora tiene {$this->hp} puntos de vida");
//    }

    public function getHp() {
        return $this->hp;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show("{$this->getName()} camina hacia $direction");
    }

    abstract public function attack(Unit $oponent);

    public function takeDamage($damage) {
//        $damage = $this->absorbDamage($damage);
        $this->hp=($this->hp - $this->absorbDamage($damage));
        show("{$this->getName()} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->getName()} muere");
        exit();
    }
    
    protected function absorbDamage($damage) {
        return $damage;
    }

}

class Soldier extends Unit {

    protected $damage = 40;
    protected $armor;

    /*
     * en el contructor se pasa la instancia de la clase armadura,
     * se pone opcional no se obliga. Por otro lado se crea a traves
     * del contructor heredado para obligar a pasarle la clase armadura
     * al soldado, esto se conoce como dependencias.
     */

    public function __construct($name) {
//        $this->setArmor($armor);
        parent::__construct($name);
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function attack(Unit $oponent) {
        show("{$this->name} ataca con la espada {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

//    public function takeDamage($damage) {
//        $damage = $this->absorbDamage($damage);
//        return parent::takeDamage($damage);
//    }

    public function absorbDamage($damage) {
        if ($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }

}

interface Armor{
    public function absorbDamage($damage);
}

class BronzeArmor implements Armor {
    public function absorbDamage($damage) {
        return $damage / 2;
    }

}

class SilverArmor implements Armor{
    
    public function absorbDamage($damage) {
        return $damage / 3;
    }

}

class CursedArmor implements Armor{
    public function absorbDamage($damage) {
        return $damage * 2;
    }
}  

//class SoldierWithSilverArmor extends Soldier{
//    public function takeDamage($damage) {
//        return parent::takeDamage($damage/3);
//    }
//}
//
//class SoldierWithGoldArmor extends Soldier{
//    public function takeDamage($damage) {
//        return parent::takeDamage($damage/3);
//    }
//}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->getName()} dispara una flecha a {$oponent->getName()}");

        $oponent->takeDamage($this->damage);
    }

//    public function takeDamage($damage) {
//        if (rand(0, 1) == 1) {
//            return parent::takeDamage($damage);
//        }
//    }
}

$armor = new BronzeArmor();
$sair = new Archer('sar');
$edwin = new Soldier('edw');
$edwin->move('Norte');
//$edwin->attack($sair);
$sair->attack($edwin);
$edwin->setArmor(new CursedArmor());
$sair->attack($edwin);

$edwin->attack($sair);

/*
 * Fin de lesson -5
 */
