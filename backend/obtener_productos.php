<?php
include 'conexion_be.php';

$query = "SELECT nombre, unidades FROM productos";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array('nombre' => $row['nombre'], 'unidades' => $row['unidades']);
}

mysqli_close($conn);

echo json_encode($data);
?>
