<?php
session_start(); // Iniciar sesión para acceder a la variable de rol

// Incluir el archivo de conexión a la base de datos
include 'conexion_be.php';

// Obtener el ID del producto y la cantidad solicitada del formulario
$id_producto = isset($_POST['id']) ? intval($_POST['id']) : 0;
$cantidad_vender = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

if ($id_producto <= 0 || $cantidad_vender <= 0) {
    echo '<script>alert("Error: Producto o cantidad inválida."); window.history.back();</script>';
    exit;
}

// Iniciar transacción
$conn->begin_transaction();

try {
    // Consultar unidades disponibles y límites de stock del producto
    $sql = "SELECT unidades, stock_minimo, precio_venta FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        throw new Exception("Producto no encontrado.");
    }

    $row = $result->fetch_assoc();
    $unidades_disponibles = $row['unidades'];
    $stock_minimo = $row['stock_minimo'];
    $precio_unitario = $row['precio_venta'];
    $stmt->close();

    // Verificar si hay suficiente stock
    if ($cantidad_vender > $unidades_disponibles) {
        throw new Exception("No hay suficientes unidades disponibles para la venta.");
    }

    if (($unidades_disponibles - $cantidad_vender) < $stock_minimo) {
        throw new Exception("No se puede realizar la venta, se bajaría del stock mínimo.");
    }

    // Calcular el total de la venta
    $total_venta = $precio_unitario * $cantidad_vender;

    // Actualizar las unidades disponibles en la tabla productos
    $nuevas_unidades = $unidades_disponibles - $cantidad_vender;
    $update_sql = "UPDATE productos SET unidades = ? WHERE id = ?";
    $stmt_update = $conn->prepare($update_sql);
    $stmt_update->bind_param("ii", $nuevas_unidades, $id_producto);
    if (!$stmt_update->execute()) {
        throw new Exception("Error al actualizar el stock del producto.");
    }
    
    // Registrar la venta en la tabla ventas
    $id_usuario = $_SESSION['id_usuario'] ?? null;
    if ($id_usuario === null) {
        throw new Exception("Error: Usuario no identificado para la venta.");
    }
    
    $insert_sql = "INSERT INTO ventas (id_producto, cantidad, precio_unitario, total, fecha_venta, id_usuario) VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmt_insert = $conn->prepare($insert_sql);
    $stmt_insert->bind_param("iidii", $id_producto, $cantidad_vender, $precio_unitario, $total_venta, $id_usuario);
    if (!$stmt_insert->execute()) {
        throw new Exception("Error al registrar la venta.");
    }

    // Confirmar la transacción
    $conn->commit();

    // Redirigir según el rol del usuario
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] === 'Administrador') {
            echo '<script>alert("Venta realizada con éxito."); window.location.href="../plantilla/template/pages/forms/ventasAdmin.php";</script>';
        } elseif ($_SESSION['rol'] === 'Ventas') {
            echo '<script>alert("Venta realizada con éxito."); window.location.href="../plantilla/template/pages/avanzado/ventasAvan.php";</script>';
        } else {
            echo '<script>alert("Venta realizada con éxito."); window.location.href="../plantilla/template/pages/default_page.php";</script>';
        }
    } else {
        echo '<script>alert("Error: No se pudo determinar el rol del usuario."); window.history.back();</script>';
    }

} catch (Exception $e) {
    // Revertir cambios en caso de error
    $conn->rollback();
    echo '<script>alert("Error: ' . $e->getMessage() . '"); window.history.back();</script>';
}

// Cerrar conexiones
$stmt_update->close();
$stmt_insert->close();
$conn->close();
?>