<?php
    $tittle = "02 - Construct";
    $description = "Constructor: A special method that runs when an object is created.";

    include 'template/header.php';

    echo "<section>";

    class PlayList {
        public $artist;
        public $album;
        public $year;
        public $song;

        public function __construct($album, $year, $song, $artist = "Unknown Artist") {
            $this->artist = $artist;
            $this->album = $album;
            $this->year = $year;
            $this->song = $song;
        }

        public function displayInfo() {
            echo "<ul>";
            echo "<li><strong>Artist:</strong> {$this->artist}</li>";
            echo "<li><strong>Album:</strong> {$this->album}</li>";
            echo "<li><strong>Year:</strong> {$this->year}</li>";
            echo "<li><strong>Song:</strong> {$this->song}</li>";
            echo "</ul>";
        }
    }

    echo "<h2>PlayList 1:</h2>";
    $pl1 = new PlayList("Black T-Shirt", 1998, "Nude Foots", "Shakira");
    $pl1->displayInfo();

    echo "<h2>PlayList 2:</h2>";
    $pl2 = new PlayList("Thriller", 1982, "Beat It", "Michael Jackson");
    $pl2->displayInfo();

    echo "<h2>PlayList 3:</h2>";
    $pl3 = new PlayList("Rumours", 1977, "Dreams", "Fleetwood Mac");
    $pl3->displayInfo();

    echo "<h2>PlayList 4 (Default Artist):</h2>";
    $pl4 = new PlayList("Mi tierra", 1993, "La Muralla Verde");
    $pl4->displayInfo();

    echo "</section>";

    include 'template/footer.php';
?>