<?php

class Person {

    protected $firstname;
    protected $lastname;
    protected $nickname;
    protected $changeNickName = 0;

    function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setNickName($nickname) {
        if (!empty($nickname)) {
            /*
             * Si queremos guardar nuestro registro en mayuscula.
             * y ademas validamos que no este vacio
             */
            if ($this->changeNickName >= 3) {
                /*
                 * Lanzamiento de exepciones con throw new en caso de repetirse un 
                 * caso muy seguido. Para este ejemplo le decimos al usuariio que
                 * no puede cambiar la el nickname mas de tres veces
                 */
                throw new Exception("No puedes cambiar el nickname mas de dos veces");
            }
            strtoupper($this->nickname = $nickname);
            $this->changeNickName++;
        }
    }

    public function getNickName() {
        /*
         * Obtenemos valores en mayuscula
         */
        return strtolower($this->nickname);
    }

    public function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

}

$person1 = new Person('Edwin', 'Mesa');
$person2 = new Person('Sair', 'Cetina');

$person1->setFirstName('Sair');
$person1->setNickName('dd');
$person1->setNickName('ddr');
$person1->setNickName('ddr');
exit($person1->getNickName());




//echo "{$person1->fullName()} es amigo de {$person2->fullName()}";

/*
 * Fin de la clase 2
 */