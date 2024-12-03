<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Venta de Productos</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../../../../assets/frontend/styleRegistro.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
<div class="container-scroller">
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="#"><img src="https://static.vecteezy.com/system/resources/previews/012/049/426/non_2x/letter-g-logo-design-initial-g-letter-logo-design-g-logo-icon-design-g-simple-logo-design-free-template-free-vector.jpg" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-mini.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item d-none d-lg-flex">
          <a class="nav-link" href="/plantilla/template/pantallaLoginAdmin.php">INICIO</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class="typcn typcn-user-outline mr-0"></i>
            <span class="nav-profile-name">ADMINISTRADOR</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="typcn typcn-cog text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item" href="../../../../index.php">
              <i class="typcn typcn-power text-primary"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <p class="sidebar-menu-title">Opciones</p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="altasAdmin.php">
            <i class="typcn typcn-device-desktop menu-icon"></i>
            <span class="menu-title">Altas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ventas-submenu" aria-expanded="false" aria-controls="ventas-submenu">
            <i class="typcn typcn-briefcase menu-icon"></i>
            <span class="menu-title">Ventas</span>
            <i class="typcn typcn-chevron-right menu-arrow"></i>
          </a>
          <div class="collapse" id="ventas-submenu">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="ventasAdmin.php">Ventas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registroVentas.php">Registro de Ventas</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pantallaProductosAdmin.php">
              <i class="typcn typcn-film menu-icon"></i>
              <span class="menu-title">Productos</span>
              <i class="menu-arrow"></i>
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pantallaUsuariosAdmin.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Usuarios </span>
            </a>
          </li>

      </ul>
    </nav>
    
    <div class="container">
  <h1>Registro de Ventas</h1>
  <form id="salesFilterForm" method="GET">
    <label for="month">Seleccionar mes:</label>
    <select id="month" name="month">
      <option value="01">Enero</option>
      <option value="02">Febrero</option>
      <option value="03">Marzo</option>
      <option value="04">Abril</option>
      <option value="05">Mayo</option>
      <option value="06">Junio</option>
      <option value="07">Julio</option>
      <option value="08">Agosto</option>
      <option value="09">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
    <button type="submit" class="btn btn-light">Filtrar</button>
  </form>

  <button id="generatePdf" class="btn btn-light">Generar PDF</button>

  <table class="sales-table">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad Vendida</th>
        <th>Precio Unitario</th>
        <th>Total Venta</th>
        <th>Fecha de Venta</th>
        <th>Vendedor</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include '../../../../backend/conexion_be.php';

        $month = $_GET['month'] ?? date('m');
        $sql = "SELECT v.*, p.nombre AS producto, u.usuario AS vendedor
                FROM ventas v
                JOIN productos p ON v.id_producto = p.id
                LEFT JOIN usuarios u ON v.id_usuario = u.id
                WHERE MONTH(v.fecha_venta) = '$month'
                ORDER BY v.fecha_venta DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['producto']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['precio_unitario']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['total']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fecha_venta']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vendedor']) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No hay registros de ventas.</td></tr>";
        }
        $conn->close();
      ?>
    </tbody>
  </table>
</div>

<script>
  document.getElementById('generatePdf').addEventListener('click', function() {
    const month = document.getElementById('month').value;
    window.location.href = `../../../../backend/generate_pdf.php?month=${month}`;
  });
</script>

<!-- Scripts -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../js/off-canvas.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
</body>
</html>
