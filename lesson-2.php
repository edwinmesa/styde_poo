<?php

class Person {

    var $firstName;
    var $lastName;

    function __construct($firstName, $lastName) {
        /*
         * Propiedades de la clase persona
         */
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /*
     * Funciones de la clase persona
     */

    function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

}

$person1 = new Person('Edwin', 'Mesa');

$person2 = new Person('Sair', 'Cetina');

echo "{$person1->fullName()} es amigo de {$person2->fullName()}";

/*
 * Fin de la clase 2
 */