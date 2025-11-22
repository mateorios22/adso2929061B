<?php
    $tittle = '03 - private';
    $description = 'Private: Restricts property or method access to only within its class.';

    include 'template/header.php';

    echo " <section>";
    
    class RenderTable {
        private $nr; # number of rows
        private $nc; # number of columns

        public function __construct($nr, $nc) {
            $this->nr = $nr;
            $this->nc = $nc;

            // Acces to private methods

            $this->startTable();
            $this->bodyTable();
            $this->endTable();
        }
        private function startTable() {
            echo "<table>";
        }
        private function bodyTable() {
            echo "<h3> Table ({$this->nr}*{$this->nc}) </h3>";
            for($r = 1; $r <= $this->nr; $r++) {
                echo "<tr>";
                for($c = 1; $c <= $this->nc; $c++ ) {
                    echo "<td> f{$r}c{$c} </td>";
                }
                echo "</tr>";
            }
        }
        private function endTable() {
            echo "</table>";
        }
    }
    $tb1 = new RenderTable(4, 3);
    $tb2 = new RenderTable(2, 5);

    include 'template/footer.php';
?>