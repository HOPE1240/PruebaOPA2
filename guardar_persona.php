<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
  $edad = isset($_POST["edad"]) ? $_POST["edad"] : "";

  if (!empty($nombre) && !empty($edad)) {
    $archivo = fopen("personas.txt", "a");
    fwrite($archivo, "$nombre, $edad\n");
    fclose($archivo);

    echo "<p class='mt-4'>¡Registro exitoso! Se ha guardado la siguiente información: Nombre: $nombre, Edad: $edad</p>";
  } else {
    echo "<p class='mt-4'>No se han proporcionado datos válidos para el registro. Por favor, ingrese nombre y edad válidos.</p>";
  }
}
?>
