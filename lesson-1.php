<?php

/*
 * Esta programacion no es funcional, pues nuestro codigo
 * se extiende. Para solucionar este problema se realiza con clase
 */

//$firstName = 'edwin';
//$lastName = 'sair';
//$fullName = $firstName.' '.$lastName;
//echo "Bienvenido $fullName";

class Person {

    var $firstName;
    var $lastName;
    
    function __construct($firstName,$lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
            
    function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

}

$person1 = new Person('Edwin','Mesa');
//$person1->firstName = 'Edwin';
//$person1->lastName = 'Sair';
//exit($person1->fullName());

$person2 = new Person('Sair','Cetina');
//$person2->firstName = 'Mesa';
//$person2->lastName = 'Cetina';
//exit($person2->fullName());

echo "{$person1->fullName()} es amigo de {$person2->fullName()}";
/*
 * 
 */