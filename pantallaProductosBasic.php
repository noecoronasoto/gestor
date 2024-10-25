<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/frontend/diseno.css">
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <title>productos</title>
    <script src="script2.js" defer></script> 
</head>
</head>
<body >
<button id="boton" class="botoni">
        <i class="bi bi-filter-left"></i> 
    </button>

    <div id="dialogo" class="barra-lateral">
        <p>ada</p>
        <p><a href="backend/volver_menuBasic.php">inicio</a></p>
        <p><a href="backend/cerrar_sesion.php"></i>Cerrar sesion</a></p>
    </div>
    <main>
        <h1 class="text">Pantalla Productos <i class="bi bi-basket-fill"></i></h1>

        <div class="tabla-productos">
    <table id="tablaProductos">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo de conexión
            include 'backend/conexion_be.php';

            $sql = "SELECT id, nombre, unidades FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Salida de datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidades']) . "</td>";
                   
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay productos</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

    </main>
</body>
</html>