<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_usb") or
    die("Error de conexion");
if (isset($conexion)) {
} else {
    echo "<h2>Error de conexion</h2>";
}
?>