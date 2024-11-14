<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Venta de Productos</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../../../../assets/frontend/styleventas.css">

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
<body >
<div  class="container-scroller">
  <!-- partial:../../partials/_navbar.html -->
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
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
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="images/faces/face29.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">ADMINISTRADOR</p>
                <p class="sidebar-designation">Pantalla Inicio</p>
              </div>
            </div>
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
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
        </ul>
      </nav> <div class="container">
    <h1>Lista de Productos</h1>
    <table class="product-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Unidades Disponibles</th>
                <th>Precio Venta</th>
                <th>Stock Mínimo</th>
                <th>Stock Máximo</th>
                <th>Fecha Ingreso</th>
                <th>Vender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../../../../backend/conexion_be.php';

            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidades']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['precio_venta']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['stock_minimo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['stock_max']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha_ingreso']) . "</td>";
                    echo "<td>";
                    echo "<form action='../../../../backend/vender_producto.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                    echo "<input type='number' name='cantidad' min='1' max='" . htmlspecialchars($row['unidades']) . "' placeholder='Cantidad' required>";
                    echo "<button type='submit' class='btn btn-sell'>Vender</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay productos</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

        
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->



</body>
</html>
