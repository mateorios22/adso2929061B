<?php
$tittle = '10 - Method Abstract';
$description = "Abstract methods must be implemented by child classes.";

include_once 'template/header.php';
?>

<section>
    <?php
    // Concepto de método abstracto
    echo '<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem; color: white; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);">';
    echo '<h3 style="margin: 0 0 0.5rem 0; font-size: 1.3rem;">💡 Concepto: Método Abstracto</h3>';
    echo '<p style="margin: 0; font-size: 0.95rem; line-height: 1.6;">Un <strong>método abstracto</strong> es declarado en una clase abstracta pero <strong>NO tiene implementación</strong>. Las clases hijas están <strong>obligadas a implementarlo</strong>.</p>';
    echo '<p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; opacity: 0.9;">📌 Sintaxis: <code style="background: rgba(255,255,255,0.2); padding: 0.2rem 0.6rem; border-radius: 4px;">abstract protected function nombreMetodo();</code></p>';
    echo '</div>';

    // ============================================
    // EJEMPLO 1: Formas Geométricas
    // ============================================
    
    abstract class Shape
    {
        protected $name;
        protected $color;

        public function __construct($name, $color)
        {
            $this->name = $name;
            $this->color = $color;
        }

        // Método abstracto - DEBE ser implementado por las clases hijas
        abstract protected function calculateArea();
        abstract protected function calculatePerimeter();

        // Método concreto - puede ser usado por todas las clases hijas
        public function showInfo()
        {
            echo "<div style='background: #f8f9fa; padding: 1rem; border-radius: 8px; margin: 1rem 0; border-left: 4px solid #667eea;'>";
            echo "<h4 style='color: #667eea; margin: 0 0 0.5rem 0;'>{$this->name}</h4>";
            echo "<p style='margin: 0.3rem 0; color: #2c3e50;'><strong>Color:</strong> {$this->color}</p>";
            echo "<p style='margin: 0.3rem 0; color: #2c3e50;'><strong>Área:</strong> {$this->calculateArea()} unidades²</p>";
            echo "<p style='margin: 0.3rem 0; color: #2c3e50;'><strong>Perímetro:</strong> {$this->calculatePerimeter()} unidades</p>";
            echo "</div>";
        }
    }

    // Clase Circle - implementa los métodos abstractos
    class Circle extends Shape
    {
        private $radius;

        public function __construct($color, $radius)
        {
            parent::__construct("Círculo", $color);
            $this->radius = $radius;
        }

        protected function calculateArea()
        {
            return round(pi() * pow($this->radius, 2), 2);
        }

        protected function calculatePerimeter()
        {
            return round(2 * pi() * $this->radius, 2);
        }
    }

    // Clase Rectangle - implementa los métodos abstractos
    class Rectangle extends Shape
    {
        private $width;
        private $height;

        public function __construct($color, $width, $height)
        {
            parent::__construct("Rectángulo", $color);
            $this->width = $width;
            $this->height = $height;
        }

        protected function calculateArea()
        {
            return $this->width * $this->height;
        }

        protected function calculatePerimeter()
        {
            return 2 * ($this->width + $this->height);
        }
    }

    // Clase Triangle - implementa los métodos abstractos
    class Triangle extends Shape
    {
        private $base;
        private $height;
        private $side1;
        private $side2;

        public function __construct($color, $base, $height, $side1, $side2)
        {
            parent::__construct("Triángulo", $color);
            $this->base = $base;
            $this->height = $height;
            $this->side1 = $side1;
            $this->side2 = $side2;
        }

        protected function calculateArea()
        {
            return round(($this->base * $this->height) / 2, 2);
        }

        protected function calculatePerimeter()
        {
            return round($this->base + $this->side1 + $this->side2, 2);
        }
    }

    // Clase Square - implementa los métodos abstractos
    class Square extends Shape
    {
        private $side;

        public function __construct($color, $side)
        {
            parent::__construct("Cuadrado", $color);
            $this->side = $side;
        }

        protected function calculateArea()
        {
            return pow($this->side, 2);
        }

        protected function calculatePerimeter()
        {
            return 4 * $this->side;
        }
    }
    ?>

    <style>
        section h2 {
            color: #667eea;
            font-size: 2rem;
            margin: 2rem 0 1rem 0;
            text-align: center;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        section .shapes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        section .example-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        section .example-section h3 {
            color: #667eea;
            font-size: 1.5rem;
            margin: 0 0 1.5rem 0;
            text-align: center;
            font-weight: 700;
        }

        section .code-explanation {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        section .highlight {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            border-radius: 6px;
            margin: 1rem 0;
            color: #856404;
        }

        @media (max-width: 768px) {
            section .shapes-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="example-section">
        <h3>🔷 Ejemplo 1: Formas Geométricas</h3>
        
        <div class="highlight">
            <strong>📌 Explicación:</strong> La clase abstracta <code>Shape</code> define dos métodos abstractos: 
            <code>calculateArea()</code> y <code>calculatePerimeter()</code>. Cada forma geométrica implementa 
            estos métodos de manera diferente según su fórmula matemática.
        </div>

        <div class="shapes-grid">
            <?php
            // Crear instancias de diferentes formas
            $circle = new Circle("Azul", 5);
            $circle->showInfo();

            $rectangle = new Rectangle("Verde", 8, 4);
            $rectangle->showInfo();

            $triangle = new Triangle("Rojo", 6, 4, 5, 5);
            $triangle->showInfo();

            $square = new Square("Amarillo", 6);
            $square->showInfo();
            ?>
        </div>
    </div>

    <?php
    // ============================================
    // EJEMPLO 2: Sistema de Pagos
    // ============================================
    
    abstract class PaymentMethod
    {
        protected $amount;
        protected $currency;

        public function __construct($amount, $currency = "USD")
        {
            $this->amount = $amount;
            $this->currency = $currency;
        }

        // Métodos abstractos
        abstract protected function processPayment();
        abstract protected function validatePayment();
        abstract protected function getTransactionFee();

        // Método concreto
        public function showReceipt()
        {
            $isValid = $this->validatePayment();
            $fee = $this->getTransactionFee();
            $total = $this->amount + $fee;

            echo "<div style='background: white; padding: 1.5rem; border-radius: 10px; margin: 1rem 0; box-shadow: 0 4px 12px rgba(0,0,0,0.1);'>";
            echo "<h4 style='color: #667eea; margin: 0 0 1rem 0; border-bottom: 2px solid #667eea; padding-bottom: 0.5rem;'>🧾 Recibo de Pago</h4>";
            echo "<p style='margin: 0.5rem 0;'><strong>Método:</strong> " . get_class($this) . "</p>";
            echo "<p style='margin: 0.5rem 0;'><strong>Monto:</strong> {$this->currency} $" . number_format($this->amount, 2) . "</p>";
            echo "<p style='margin: 0.5rem 0;'><strong>Comisión:</strong> {$this->currency} $" . number_format($fee, 2) . "</p>";
            echo "<p style='margin: 0.5rem 0; font-size: 1.2rem; color: #667eea;'><strong>Total:</strong> {$this->currency} $" . number_format($total, 2) . "</p>";
            echo "<p style='margin: 0.5rem 0;'><strong>Estado:</strong> " . ($isValid ? "✅ Válido" : "❌ Inválido") . "</p>";
            echo "<p style='margin: 0.5rem 0;'><strong>Resultado:</strong> {$this->processPayment()}</p>";
            echo "</div>";
        }
    }

    class CreditCard extends PaymentMethod
    {
        protected function processPayment()
        {
            return "💳 Pago procesado con tarjeta de crédito";
        }

        protected function validatePayment()
        {
            return $this->amount > 0 && $this->amount <= 10000;
        }

        protected function getTransactionFee()
        {
            return $this->amount * 0.029; // 2.9% de comisión
        }
    }

    class PayPal extends PaymentMethod
    {
        protected function processPayment()
        {
            return "🅿️ Pago procesado con PayPal";
        }

        protected function validatePayment()
        {
            return $this->amount > 0 && $this->amount <= 5000;
        }

        protected function getTransactionFee()
        {
            return $this->amount * 0.034 + 0.30; // 3.4% + $0.30
        }
    }

    class BankTransfer extends PaymentMethod
    {
        protected function processPayment()
        {
            return "🏦 Transferencia bancaria completada";
        }

        protected function validatePayment()
        {
            return $this->amount > 0;
        }

        protected function getTransactionFee()
        {
            return 5.00; // Tarifa fija de $5
        }
    }

    class Cryptocurrency extends PaymentMethod
    {
        protected function processPayment()
        {
            return "₿ Pago procesado con criptomonedas";
        }

        protected function validatePayment()
        {
            return $this->amount > 10; // Mínimo $10
        }

        protected function getTransactionFee()
        {
            return $this->amount * 0.01; // 1% de comisión
        }
    }
    ?>

    <div class="example-section">
        <h3>💳 Ejemplo 2: Sistema de Pagos</h3>
        
        <div class="highlight">
            <strong>📌 Explicación:</strong> La clase abstracta <code>PaymentMethod</code> obliga a cada método 
            de pago a implementar <code>processPayment()</code>, <code>validatePayment()</code> y 
            <code>getTransactionFee()</code>, permitiendo diferentes lógicas según el tipo de pago.
        </div>

        <div class="shapes-grid">
            <?php
            $payments = [
                new CreditCard(250.00),
                new PayPal(150.50),
                new BankTransfer(1000.00),
                new Cryptocurrency(500.00)
            ];

            foreach ($payments as $payment) {
                $payment->showReceipt();
            }
            ?>
        </div>
    </div>

    <div class="code-explanation">
        <strong>🔑 Puntos clave sobre métodos abstractos:</strong><br><br>
        1️⃣ Se declaran sin cuerpo: <code>abstract protected function method();</code><br>
        2️⃣ Solo pueden existir en clases abstractas<br>
        3️⃣ Las clases hijas DEBEN implementarlos<br>
        4️⃣ Permiten polimorfismo: misma interfaz, diferentes implementaciones<br>
        5️⃣ Garantizan que todas las clases hijas tengan ciertos métodos
    </div>

</section>

<?php
include_once 'template/footer.php';
?>