<?php
    $tittle = '05 - parameters';
    $description = 'Parameters: Values passed into a function to customize its operation.';

    include 'template/header.php';

    echo " <section>";
    
    class Country {
        public $name;
        public function __construct($name) {
            $this->name = $name;
        }
    }

    class FifaworldCup {
        private $country;
        private $year;
        private $winner;
        
        public function __construct($country, $year, $winner = 'Brazil') {
            $this->country = $country;
            $this->year = $year;
            $this->winner = $winner;
        } 

        public function showEvent() {
            // Si country es objeto, accede a name; si es string, úsalo directamente
            $countryName = is_object($this->country) ? $this->country->name : $this->country;
            
            echo 
            "<ul> 
                <li>
                    <span><strong>Country:</strong> {$countryName}</span>
                    <span><strong>Year:</strong> {$this->year}</span>
                    <span><strong>Winner:</strong> {$this->winner}</span>
                </li>
            </ul>";
        }
    }

    // Corrección: pasar el objeto completo, no solo el name
    $country1 = new Country('Italy');
    $worldcup1 = new FifaworldCup($country1, 1990, 'Germany');
    $worldcup1->showEvent();

    $country2 = new Country('USA');
    $worldcup2 = new FifaworldCup($country2, 1994);
    $worldcup2->showEvent();

    $country3 = new Country('FRANCE');
    $worldcup3 = new FifaworldCup($country3, 1998, 'FRANCE');
    $worldcup3->showEvent();

    $country4 = new Country('KOREA-JAPAN');
    $worldcup4 = new FifaworldCup($country4, 2002);
    $worldcup4->showEvent();

    include 'template/footer.php';
?>