<?php
$tittle = '06 - Extends';
$description = 'Extends: Creando una nueva clase basada en otra existente';

include 'template/header.php';
?>

<section>
    <?php
    class Operation {
        protected $num1;
        protected $num2;

        public function __construct($num1, $num2) {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
    }
    class Addition extends Operation {
        public function showResult() {
            $result = $this->num1 + $this->num2;
            return "<ul>
                        <li>{$this->num1} + {$this->num2} = {$result}</li>
                    </ul>";
        }
    }
    class Substraction extends Operation {
        public function showResult() {
            $result = $this->num1 - $this->num2;
            return "<ul>
                        <li>{$this->num1} - {$this->num2} = {$result}</li>
                    </ul>";
        }
    }

    class Product extends Operation {
        public function showResult() {
            $result = $this->num1 * $this->num2;
            return "<ul>
                        <li>{$this->num1} * {$this->num2} = {$result}</li>
                    </ul>";
        }
    }

    class Division extends Operation {
        public function showResult() {
            $result = $this->num1 / $this->num2;
            return "<ul>
                        <li>{$this->num1} / {$this->num2} = {$result}</li>
                    </ul>";
        }
    }
    class Pow extends Operation {
        public function showResult() {
            $result = $this->num1 ** $this->num2;
            return "<ul>
                        <li>{$this->num1} ** {$this->num2} = {$result}</li>
                    </ul>";
        }
    }

    $op1 = new Addition(128, 256);
    echo $op1 -> showResult();
    $op2 = new Substraction(34, 78);
    echo $op2 -> showResult();
    $op3 = new Product(500, 150);
    echo $op3 -> showResult();
    $op4 = new Division(500, 150);
    echo $op4 -> showResult();
    $op5 = new Pow(2, 8);
    echo $op5 -> showResult();
    ?>
</section>

<?php
include 'template/footer.php';
?>