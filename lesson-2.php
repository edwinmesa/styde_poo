 <?php

class Person {

    protected $firstname;
    protected $lastname;
    protected $nickname;
    protected $changeNickName = 0;
    protected $birthday;
    protected $age;

    function __construct($firstName, $lastName, $birthday) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
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

//    public function setNickName($nickname) {
//        if (!empty($nickname)) {
//            /*
//             * Si queremos guardar nuestro registro en mayuscula.
//             * y ademas validamos que no este vacio
//             */
//            if ($this->changeNickName >= 3) {
//                /*
//                 * Lanzamiento de exepciones con throw new en caso de repetirse un 
//                 * caso muy seguido. Para este ejemplo le decimos al usuariio que
//                 * no puede cambiar la el nickname mas de tres veces
//                 */
//                throw new Exception("No puedes cambiar el nickname mas de dos veces");
//            }
//
//            strtoupper($this->nickname = $nickname);
//            $this->changeNickName++;
//        }
//    }

    /*
     * Agrega validación adicional para que el usuario sólo pueda agregar nicknames
     *  que tengan al menos 2 caracteres y no sean igual a su nombre o apellido
     */
    public function setNickName($nickname) {
        if ($nickname == $this->getFirstName() or $nickname == $this->getLastName()) {
            exit('El nick name no puede ser igual a nombre o apellido');
        }
        if (strlen($nickname) < 2) {
            exit('El nickname no puede ser menor a dos caracteres');
        }
    }

    /*
     * Agrega la propiedad “fecha de nacimiento” a la clase persona, y que esta
     *  propiedad pueda pasarse a través del constructor. Luego crea un método para 
     * obtener la edad del usuario (getAge), por supuesto la edad la vas a calcular
     *  a partir de la fecha de nacimiento.
     */

    public function getNickName() {
        /*
         * Obtenemos valores en mayuscula
         */
        return strtolower($this->nickname);
    }

    public function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function setBirthDay($birthday) {
        $this->birthday = $birthday;
    }

    public function getBirthDay() {
        return $this->birthday;
    }

    public function getAge() {
        $f = explode("-", $this->birthday);
        $cal = (date("Y")-$f[0]);
        return $cal;
    }

}

$person1 = new Person('Edwin', 'Mesa', 1987);
$person2 = new Person('Sair', 'Cetina', 1987);

echo $person1->getAge();

//$person1->setFirstName('E');
//$person1->setNickName('A');

//$person1->setNickName('ddr');
//exit($person1->getAge());
//exit($person1->getNickName());

//echo "{$person1->fullName()} es amigo de {$person2->fullName()}";

/*
 * Fin de la clase 2
 */