
<?php
/**
 * Script que muestra los números primos entre dos números dados por el usuario.
 * 
 * PHP version 8.1
 * 
 * @category Math
 * @package  PrimosApp
 * @author   
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  1.0
 * @link     http://localhost/primos.php
 */

/**
 * Comprueba si un número es primo.
 *
 * @param int $numero Número a comprobar
 *
 * @return bool True si es primo, false en caso contrario
 */
function esPrimo(int $numero): bool
{
    if ($numero <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i === 0) {
            return false;
        }
    }

    return true;
}

/**
 * Devuelve un array con todos los números primos entre dos límites.
 *
 * @param int $inicio Número inicial del rango
 * @param int $fin    Número final del rango
 *
 * @return array Lista de números primos
 */
function obtenerPrimos(int $inicio, int $fin): array
{
    $primos = [];
    for ($i = $inicio; $i <= $fin; $i++) {
        if (esPrimo($i)) {
            $primos[] = $i;
        }
    }
    return $primos;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Números Primos</title>
</head>
<body>
    <h1>Calculadora de Números Primos</h1>
    <form method="post">
        <label for="inicio">Número inicial:</label>
        <input type="number" name="inicio" id="inicio" required>
        <br>
        <label for="fin">Número final:</label>
        <input type="number" name="fin" id="fin" required>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $inicio = intval($_POST['inicio']);
        $fin = intval($_POST['fin']);

        if ($inicio > $fin) {
            echo "<p style='color:red;'>El número inicial debe ser menor o igual que el número final.</p>";
        } else {
            $primos = obtenerPrimos($inicio, $fin);
            echo "<h2>Primos entre $inicio y $fin:</h2>";
            echo "<p>" . implode(", ", $primos) . "</p>";
        }
    }
    ?>
</body>
</html>
