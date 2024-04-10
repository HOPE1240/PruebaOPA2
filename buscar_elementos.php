<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-4">Resultados de la Búsqueda</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $minCalories = isset($_POST["minCalories"]) ? min($_POST["minCalories"], 1000) : 0; // Limitando el valor a 1000 como máximo
        $maxWeight = isset($_POST["maxWeight"]) ? min($_POST["maxWeight"], 50) : 0; // Limitando el valor a 50 como máximo

        if ($minCalories > 0 || $maxWeight > 0) {
            echo "<p class='mt-3'>Restricciones:</p>";
            echo "<ul>";
            if ($minCalories > 0) {
                echo "<li>Calorías mínimas requeridas: $minCalories</li>";
            } else {
                echo "<li>No se ha especificado un mínimo de calorías.</li>";
            }
            if ($maxWeight > 0) {
                echo "<li>Peso máximo a llevar: $maxWeight kg</li>";
            } else {
                echo "<li>No se ha especificado un peso máximo a llevar.</li>";
            }
            echo "</ul>";

            // Código para buscar los elementos óptimos
            $elements = [
                ["name" => "E1", "weight" => 5, "calories" => 3],
                ["name" => "E2", "weight" => 3, "calories" => 5],
                ["name" => "E3", "weight" => 5, "calories" => 2],
                ["name" => "E4", "weight" => 1, "calories" => 8],
                ["name" => "E5", "weight" => 2, "calories" => 3]
            ];

            $validElements = [];
            foreach ($elements as $element) {
                if ($element["calories"] >= $minCalories && $element["weight"] <= $maxWeight) {
                    $validElements[] = $element;
                }
            }

            if (!empty($validElements)) {
                echo "<h3 class='mt-4'>Elementos Viables:</h3>";
                foreach ($validElements as $element) {
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Elemento {$element['name']}</h5>";
                    echo "<p class='card-text'>Peso: {$element['weight']}, Calorías: {$element['calories']}</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='mt-4'>No se encontraron elementos que cumplan con las restricciones de calorías mínimas y peso máximo.</p>";
            }
        } else {
            echo "<p class='mt-4'>No se han establecido restricciones de calorías mínimas o peso máximo. Por favor, ingrese valores válidos.</p>";
        }
    } else {
        echo "<p class='mt-4'>No se han enviado datos de búsqueda. Por favor, complete el formulario de búsqueda primero.</p>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

