

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/frontend/diseno.css">
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
    <title>Productos</title>
    <script src="script2.js" defer></script>
    <script src="script3.js" defer></script> 
   
</head>
<body>

<div class="container-scroller">
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
                <p class="sidebar-name">
                  ADMINISTRADOR
                </p>
                <p class="sidebar-designation">
                  Pantalla Incio
                </p>
              </div>
            </div>

            <p class="sidebar-menu-title">Opciones</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="altasAdmin.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Altas </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="ventasAdmin.php" aria-expanded="false" aria-controls="ui-basic">
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
              <span class="menu-title">Usuarios </span>
            </a>
          </li>

      </nav>
      <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tabla Productos</h4>
                  <p class="card-description">
                    Productos
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                      <th >Nombre del Producto</th>
                      <th >Unidades</th>
                      <th >Precio</th>
                      <th > Stock min</th>
                      <th >  Stock max      </th>
                      <th >   Fecha de ingreso     </th>
                      <th >    Descripcion     </th>
                      <th >    acciones     </th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    <?php
            // Incluir el archivo de conexión
            include '../../../../backend/conexion_be.php';

            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Salida de datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidades']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['precio_compra']) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row['stock_minimo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['stock_max']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha_ingreso']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                
                    
                                echo "<td>";
                                echo "<button class='btn btn-danger btn-rounded btn-fw ' onclick=\"window.location.href='../../../../backend/eliminar_producto.php?id=" . htmlspecialchars($row['id']) . "'\">Borrar</button>";
                                        
                                echo "<button class='btn btn-danger btn-rounded btn-fw ' onclick=\"modificarProducto(" . htmlspecialchars($row['id']) . ", '" . htmlspecialchars($row['nombre']) . "'," . htmlspecialchars($row['stock_minimo']) . ", " . htmlspecialchars($row['stock_max']) . ", " . htmlspecialchars($row['precio_venta']) . ")\">Modificar</button>";


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
                </div>
              </div>
            </div>
       
<div class="modal fade" id="modificarProductoModal" tabindex="-1" role="dialog" aria-labelledby="modificarProductoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarProductoModalLabel">Modificar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modificarProductoForm">
          <input type="hidden" id="productoId" name="id">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="cantidadmin">Stock Mínimo</label>
            <input type="number" class="form-control" id="cantidadmin" name="cantidadmi">
          </div>
          <div class="form-group">
            <label for="cantidadmax">Stock Máximo</label>
            <input type="number" class="form-control" id="cantidadmax" name="cantidadma">
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="cantidadma">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="submitModificarProductoForm()">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

                  

    

  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../../../script3.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>