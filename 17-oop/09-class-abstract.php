<?php
$tittle = '09 - Class Abstract';
$description = "A class that cannot be instantiated, only extended from.";

include_once 'template/header.php';
?>

<section>
    <?php
    abstract class DataBase
    {
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $dbname = 'bdpkemon';  // ✅ Cambiado de 'pokeadso' a 'bdpkemon'
        protected $conx;

        protected function connect()
        {
            try {
                $this->conx = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->user,
                    $this->pass
                );
                $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conx;
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
    }

    class PokemonList extends DataBase
    {
        public function getPokemons()
        {
            $db = $this->connect();
            $sql = "SELECT id, name, type FROM pokemons";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // Concepto de clase abstracta
    echo '<div style="background: #fff3cd; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #ffc107;">';
    echo '<h3 style="color: #856404; margin: 0 0 0.5rem 0;">💡 Concepto: Clase Abstracta</h3>';
    echo '<p style="color: #856404; margin: 0;">Una clase abstracta <strong>NO puede ser instanciada</strong> directamente. Solo puede ser heredada.</p>';
    echo '</div>';

    // Intentar obtener los pokémons
    try {
        $pokemon = new PokemonList();
        $pokemons = $pokemon->getPokemons();
    ?>
        <style>
            section div.pokemon-container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 100%;
                padding: 1rem;
            }

            section table {
                border: 1px solid rgba(0, 0, 0, 0.4);
                border-collapse: collapse;
                font-size: 1rem;
                width: 90%;
                max-width: 800px;
                margin: 1.5rem auto;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            section table th {
                border: 1px solid #636ED1;
                background: linear-gradient(135deg, #535EBA 0%, #636ED1 100%);
                color: white;
                padding: 1rem 0.6rem;
                font-weight: 700;
                font-size: 1.1rem;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            section table td {
                border: 1px solid #8690F1;
                background-color: #AEB4FF;
                color: #232060;
                padding: 0.8rem 0.6rem;
                text-align: center;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            section table tr:hover td {
                background-color: #9BA4FF;
            }

            section h2 {
                color: #535EBA;
                font-size: 2rem;
                margin-bottom: 1rem;
                text-align: center;
                font-weight: 700;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            }

            section .success-message {
                background: linear-gradient(135deg, #51cf66 0%, #40c057 100%);
                color: white;
                padding: 1rem;
                border-radius: 8px;
                text-align: center;
                font-weight: 600;
                margin: 1rem auto;
                max-width: 600px;
                box-shadow: 0 4px 12px rgba(81, 207, 102, 0.3);
            }

            section .error-message {
                background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
                color: white;
                padding: 1.5rem;
                border-radius: 10px;
                text-align: center;
                font-weight: 600;
                box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
                margin: 2rem auto;
                max-width: 600px;
            }
        </style>

        <div class="pokemon-container">
            <h2>📋 Lista de Pokémons</h2>
            
            <?php if (!empty($pokemons)): ?>
                <div class="success-message">
                    ✅ Se encontraron <?= count($pokemons); ?> pokémons en la base de datos
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pokemons as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p['id']); ?></td>
                                <td><?= htmlspecialchars($p['name']); ?></td>
                                <td><?= htmlspecialchars($p['type']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="error-message">
                    ⚠️ No se encontraron pokémons en la base de datos
                </div>
            <?php endif; ?>
        </div>
    <?php
    } catch (Exception $e) {
        echo '<div class="error-message">';
        echo '<h3>❌ Error de Conexión</h3>';
        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '</div>';
    }
    ?>
</section>

<?php
include_once 'template/footer.php';
?>