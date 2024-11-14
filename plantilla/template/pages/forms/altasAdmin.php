<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alta productos</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
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
            <a class="nav-link"  href="ventasAdmin.php" >
              <i class="typcn typcn-briefcase menu-icon"></i>
              <span class="menu-title">Ventas</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
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
      </nav>
      <div class="main-panel" >        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Alta Productos</h4>
                  <p class="card-description">Información</p>
                  <form class="forms-sample" action="../../../../backend/registro_producto.php" method="POST"  onsubmit="document.getElementById('ingresar').style.display = 'block'; return false;">
                    <div class="form-group">
                      <label for="productoNuevo">Nombre producto</label>
                      <input type="text" class="form-control"  name="productoNuevo" placeholder="Nombre" >
                    </div>
                    <div class="form-group">
                      <label for="fechaNueva">Fecha ingreso</label>
                      <input type="date" class="form-control"  name="fechaNueva">
                    </div>
                    <div class="form-group">
                      <label for="unidadNueva">Unidades</label>
                      <input type="number" class="form-control"  name="unidadNueva" placeholder="Unidades">
                    </div>
                    <div class="form-group">
                      <label for="precioNuevo">Precio Venta</label>
                      <input type="number" class="form-control"  name="precioNuevo" placeholder="Precio">
                    </div>
                    <div class="form-group">
                      <label for="stockNuevo">Stock Máximo</label>
                      <input type="number" class="form-control"  name="stockNuevo" placeholder="Máximo">
                    </div>
                    <div class="form-group">
                      <label for="stockminNuevo">Stock Mínimo</label>
                      <input type="number" class="form-control"  name="stockminNuevo" placeholder="Mínimo">
                    </div>
                    <div>
                      <p></p>
                    </div>
                    <div class="form-group">
                    <label for="descripNueva">Descripción</label>
                      <input type="text" class="form-control"  name="descripNueva" placeholder="Descripción">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
                 
     
            <?php
            // Incluir el archivo de conexión
            include '../../../../backend/conexion_be.php';

            $sql = "SELECT nombre FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
?>

<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Modificar Producto Existente</h4>
      <p class="card-description">Información del producto</p>
      <form class="forms-sample" action="../../../../backend/registro_productoexist.php" method="POST">
      <div class="form-group">
    <label for="productoSeleccionado">Seleccionar Producto</label>
    <select class="form-control" name="productoSeleccionado">
        <?php
        if ($result->num_rows > 0) {
            // Iterar sobre los resultados y crear una opción para cada producto
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['nombre']) . '">' . htmlspecialchars($row['nombre']) . '</option>';
            }
        } else {
            // En caso de no haber resultados, mostrar una opción vacía o un mensaje
            echo '<option value="">No hay productos disponibles</option>';
        }
        ?>
    </select>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>
        <div class="form-group">
          <label for="fechaNueva">Fecha ingreso</label>
          <input type="date" class="form-control" name="fechaNueva">
        </div>
        <div class="form-group">
          <label for="unidadNueva">Unidades</label>
          <input type="number" class="form-control" name="unidadNueva" placeholder="Unidades">
        </div>
        <div class="form-group">
          <label for="precioNuevo">Precio Venta</label>
          <input type="number" class="form-control" name="precioNuevo" placeholder="Precio">
        </div>
        <div class="form-group">
          <label for="descripNueva">Descripción</label>
          <input type="text" class="form-control" name="descripNueva" placeholder="Descripción">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
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
