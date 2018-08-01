<?php

/*
 * Repaso de Leccion 5:
 * Interfaces y Polimorfismo. Es la habilidad de que tiene un metodo
 * dentro de un objecto de interactuar con diferentes objetos de diferentes
 * clases de la misma forma pero con resultados diferentes.
 */

//Inicio de Repaso de Lecciones.

function show($message) {
    echo "<p>{$message}</p>";
}

abstract class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;

    public function getName() {
        return $this->name;
    }

    private function setHp($points) {
        $this->hp = $points;
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }

    public function getHp() {
        return $this->hp;
    }

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $oponent);

    public function takeDamage($damage) {
        $this->setHp($this->hp - $damage);
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->name} muere");
        exit();
    }

}

class Soldier extends Unit {

    protected $armor;
    protected $damage = 40;

    /*
     * Este es un llamado de contrsuctor de la clase UNIT
     * con el fin de pasar un valor que para la armadura
     * con nivel 2.
     * Pero creamos una clase Armor que a traves de la propiedad
     * creamos una instancia que absorbe la mitad  del daño.
     * Se deja como null porque hay soldados que no pueden tener
     * armadura y asi evitamos que sea obligatorio este parametro
     * dependencia opcional.
     */

    public function __construct($name) {

        parent::__construct($name);
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function attack(Unit $oponent) {
        show("{$this->name} ataca con la espada a {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        /*
         * Como creamos una propiedad el daño recibido 
         * es el que pasamos en la creacion del objeto.
         * Y validamos si el soldado tiene una armadura
         * Con esto estamos tomando decisiones dentro de
         * la misma clase y no estamos pidiendo informacion de otras
         * fuentes, esto es polimorfismo en esencia y el uso del
         * tell don't ask
         */
        $damage = $this->absorbDamage($damage);
        return parent::takeDamage($damage);
    }
    
    protected function absorbDamage($damage) {
            if ($this->armor) {
                $damage = $this->armor->absorbDamage($damage);
            }
            return $damage;
        }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $oponent) {
        show("{$this->name} dispara una flecha a {$oponent->getName()}");
        $oponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        if (rand(0, 1) == 1) {
            return parent::takeDamage($damage);
        }
    }

}

class Armor {

    public function absorbDamage($damage) {
        return $damage / 2;
    }

}

//Creacion de una instancia armadura esto se conoce como
//inyeccion de dependencias.
$armor = new Armor();
$sar = new Soldier('Bestia');
$edwin = new Archer('Sar');
$sar = new Soldier('Bestia', $armor);
//$edwin->move('Norte');
$edwin->attack($sar);
$edwin->attack($sar);
$sar->attack($edwin);
