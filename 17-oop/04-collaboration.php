<?php
    $tittle = '04 - collaboration';
    $description = "Collaboration: Objects working together by calling each other's methods.";

    include 'template/header.php';

    echo " <section>";
    
    class Evolve {
        public function evolvePokemon($orignin, $evolution) {
            echo "<ul><li> {$orignin}➡️{$evolution} </li></ul>";
        }
    }

    class pokemon {
        private $orignin;
        private $evolution;
        private $collaboration;

        public function __construct($orignin, $evolution) {
            $this->orignin = $orignin;
            $this->evolution = $evolution;
            $this->collaboration = new Evolve();
        }

        public function nextLevel() {
            $this->collaboration->evolvePokemon($this->orignin, $this->evolution);
        }
    }
$ev1 = new pokemon('Pichu', 'Pikachu');
$ev1->nextLevel();
$ev1 = new pokemon('Pikachu', 'Raichu');
$ev1->nextLevel();

$ev2 = new pokemon('Charmander', 'Charmeleon');
$ev2->nextLevel();
$ev2 = new pokemon('Charmeleon', 'Charizard');
$ev2->nextLevel();


    include 'template/footer.php';
?>