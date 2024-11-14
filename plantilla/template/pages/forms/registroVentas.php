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
      <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
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

          $sql = "SELECT v.*, p.nombre AS producto, u.usuario AS vendedor
                  FROM ventas v
                  JOIN productos p ON v.id_producto = p.id
                  LEFT JOIN usuarios u ON v.id_usuario = u.id
                  ORDER BY v.fecha_venta DESC";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['producto']) . "</td>";
              echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
              echo "<td>" . htmlspecialchars($row['precio_unitario']) . "</td>";
              echo "<td>" . htmlspecialchars($row['total']) . "</td>";
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
  </div>
</div>

<!-- Scripts -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../js/off-canvas.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
</body>
</html>
