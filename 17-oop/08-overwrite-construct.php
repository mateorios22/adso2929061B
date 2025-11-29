<?php
$tittle = '08 - Overwrite Construct';
$description = "Redefining a parent class's constructor in the child class using parent::__construct()";

include 'template/header.php';
?>

<section>
    <?php
    class VideoGame {
        protected $name;
        protected $platform;
        protected $year;

        public function __construct($name, $platform) {
            $this->name     = $name;
            $this->platform = $platform;
        }
    }
    class Game extends VideoGame {
        public function __construct($name, $platform, $year) {
            parent::__construct($name, $platform);
            $this->year = $year;
        }
        public function showVideoGame() {
            echo "<ul><li>Name: {$this->name} <br>
                           Platform: {$this->platform} <br>
                           Year: {$this->year}</li></ul>";
        }
    }

    $gm = new Game('Halo Infinite', 'Xbox Series X', 2021);
    $gm->showVideoGame();
    $gm = new Game('God of War Ragnarok', 'Play Station 5', 2022);
    $gm->showVideoGame();
    $gm = new Game('Super Mario Wonder', 'Nintendo Switch', 2023);
    $gm->showVideoGame();
    ?>
</section>

<?php
include 'template/footer.php';
?>