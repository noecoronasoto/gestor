<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('../assets/fpdf186/fpdf.php');
include 'conexion_be.php';

// Obtener el mes seleccionado o el mes actual por defecto
$month = $_GET['month'] ?? date('m');

// Consulta para obtener los datos del mes seleccionado
$sql = "SELECT v.*, p.nombre AS producto, u.usuario AS vendedor
        FROM ventas v
        JOIN productos p ON v.id_producto = p.id
        LEFT JOIN usuarios u ON v.id_usuario = u.id
        WHERE MONTH(v.fecha_venta) = '$month'
        ORDER BY v.fecha_venta DESC";
$result = $conn->query($sql);

// Verificar si la consulta devuelve resultados
if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Crear el PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Encabezado con logo y título
$pdf->Image('../assets/images/logo_tienda.png', 10, 10, 30); // Cambia la ruta al logo
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'GIMP - Reporte de Ventas', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Mes: ' . date('F', mktime(0, 0, 0, $month, 10)), 0, 1, 'C');
$pdf->Ln(10);

// Encabezados de la tabla con colores
$pdf->SetFillColor(240, 240, 240); // Fondo gris claro
$pdf->SetFont('Arial', 'B', 10);

// Definir el ancho de las columnas, ajustado para evitar desbordes
$colWidth = array(40, 25, 25, 25, 45, 25); // Ancho de cada columna

// Crear las cabeceras de la tabla
$pdf->Cell($colWidth[0], 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell($colWidth[1], 10, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell($colWidth[2], 10, 'Precio Unit.', 1, 0, 'C', true);
$pdf->Cell($colWidth[3], 10, 'Total', 1, 0, 'C', true);
$pdf->Cell($colWidth[4], 10, 'Fecha Venta', 1, 0, 'C', true);
$pdf->Cell($colWidth[5], 10, 'Vendedor', 1, 0, 'C', true);
$pdf->Ln();

// Cuerpo de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(250, 250, 250); // Fondo blanco
$pdf->SetTextColor(0); // Color del texto negro
$fill = false;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ajustar automáticamente las celdas según el contenido
        $pdf->Cell($colWidth[0], 10, utf8_decode($row['producto']), 1, 0, 'C', $fill);
        $pdf->Cell($colWidth[1], 10, $row['cantidad'], 1, 0, 'C', $fill);
        $pdf->Cell($colWidth[2], 10, '$' . number_format($row['precio_unitario'], 2), 1, 0, 'C', $fill);
        $pdf->Cell($colWidth[3], 10, '$' . number_format($row['total'], 2), 1, 0, 'C', $fill);
        
        // Mostrar fecha y hora por separado
        $fecha_venta = date('d/m/Y', strtotime($row['fecha_venta']));
        $pdf->Cell($colWidth[4], 10, $fecha_venta, 1, 0, 'C', $fill); // Fecha
        $pdf->Cell($colWidth[5], 10, utf8_decode($row['vendedor']), 1, 0, 'C', $fill); // Vendedor
        $pdf->Ln();

        $fill = !$fill; // Alternar el color de fondo
    }
} else {
    $pdf->Cell(0, 10, 'No hay registros de ventas para este mes.', 1, 1, 'C', true);
}

// Pie de página con fecha y hora
$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Reporte generado el: ' . date('d/m/Y H:i:s'), 0, 0, 'C');

// Enviar el PDF al navegador
$pdf->Output('D', 'Reporte_Ventas_' . $month . '.pdf');
$conn->close();
?>
