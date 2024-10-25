<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/frontend/diseno.css">
    
    <title>Productos</title>
    <script src="script2.js" defer></script>
    <script src="script3.js" defer></script> 
   
</head>
<body>

    <button id="boton" class="botoni">
        <i class="bi bi-filter-left"></i> 
    </button>

    <div id="dialogo" class="barra-lateral">
        <p>ada</p>
        <p><a href="backend/volver_menu.php">Inicio</a></p>
        <p><a href="backend/cerrar_sesion.php">Cerrar sesión</a></p>
    </div>
    <main>
        <h1 class="text">Pantalla Productos <i class="bi bi-basket-fill"></i></h1>

        <div class="tabla-productos">
    <table id="tablaProductos">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Acciones</th>
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
                    echo "<td>
                            <button class='BtnBorrar' onclick=\"window.location.href='backend/eliminar_producto.php?id=" . htmlspecialchars($row['id']) . "'\">Borrar</button>
                            <button class='BtnModificar' onclick=\"abrirModalModificar(" . htmlspecialchars($row['id']) . ", '" . htmlspecialchars($row['nombre']) . "', " . htmlspecialchars($row['unidades']) . ")\">Modificar</button>
                          </td>"; // Botones de borrar y modificar
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


        <div class="botonesPan">
            
            <button class="BtnAgregarP">Agregar Producto</button>
           
        </div>

        <!-- Modal para agregar producto -->
        <div id="modalAgregarProducto" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar Producto</h2>
                <form id="formAgregarProducto" action="backend/registro_producto.php" method="POST">
                    <label for="nombreProducto">Nombre del Producto:</label>
                    <input type="text" name="productoNuevo" required>
                    
                    <label for="cantidadProducto">Cantidad:</label>
                    <input type="number" name="cantidadNueva" required>
                    
                    <button type="submit">Agregar</button>
                </form>
            </div>
        </div>
        <!-- Modal para modificar producto -->
<div id="modalModificarProducto" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModalModificar()">&times;</span>
        <h2>Modificar Producto</h2>
        <form id="formModificarProducto" action="backend/modificar_producto.php" method="POST">
            <input type="hidden" name="id" id="productoId">
            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" name="nombre" id="nombreProducto" required>
            
            <label for="cantidadProducto">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidadProducto" required>
            
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>
    </main>
</body>
</html>
