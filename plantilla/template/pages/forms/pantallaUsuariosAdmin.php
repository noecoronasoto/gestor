<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../../assets/frontend/stylest.css">
    <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../images/favicon.png" />
    
    <title>AGREGAR USUARIOS</title>
    <script src="script2.js" defer></script>
    <script src="script3.js" defer></script> 
</head>
<body>



<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo-mini"/></a>
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
    <div class="container-fluid page-body-wrapper">
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
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/forms/pantallaUsuariosAdmin.php">
                        <i class="typcn typcn-device-desktop menu-icon"></i>
                        <span class="menu-title">Usuarios</span>
                    </a>
                </li>
            </ul>
        </nav>

        
        <main class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuarios Registrados</h4>
                    <div class="table-responsive">
                        <?php
                        include '../../../../backend/conexion_be.php';

                        $sql = "SELECT id, usuario, rol FROM usuarios WHERE id != 1";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Error en la consulta: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered">';
                            echo '<thead><tr><th>ID</th><th>Usuario</th><th>Rol</th><th>Acción</th></tr></thead>';
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['usuario']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['rol']) . '</td>';
                                echo '<td><button class=btn btn-primary mr-2 onclick="abrirModalEliminar(' . $row['id'] . ')">Eliminar</button></td>';
                                echo '</tr>';
                            }
                            echo '</tbody></table>';
                        } else {
                            echo '<p>No hay usuarios registrados.</p>';
                        }

                        $conn->close();
                        ?>
                    </div>
                    <div class="botonesPan">
                        <button class="btn btn-primary mr-2" onclick="abrirModal()">Agregar Usuario</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal para agregar usuario -->
<div id="modalAgregarUsuario" class="modal" style="display: none;">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModal()">&times;</span>
        <h2>Agregar Usuario</h2>
        <form id="formAgregarUsuario" action="../../../../backend/registro_usua.php" method="POST">
        <p style="text-align: left;"><label for="usuario">Usuario:</label></p>
        <input type="text" name="usuario" maxlength="8" required placeholder ="Ingresa el usuario">

            <p style="text-align: left;"> <label for="contrasena">Contraseña:</label></p>

            <input type="password" name="contrasena" maxlength="8" required placeholder="Ingresa la contraseña">
            
            <p style="text-align: left;"> <label for="rol">Rol:</label></p>
            <select name="rol" required>
                <option value="Ventas">Ventas</option>
                <option value="Cliente">Cliente</option>
            </select>

            <button type="submit" class="btn-agregar">Agregar Usuario</button>
        </form>
    </div>
</div>


    <!-- Modal para eliminar usuario -->
    <div id="modalEliminarUsuario" class="modal" style="display: none;">
        <div class="modal-contenido">
            <span class="cerrar" onclick="cerrarModalEliminar()">&times;</span>
            <h2>Eliminar Usuario</h2>
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <form id="formEliminarUsuario" action="../../../../backend/eliminar_usu.php" method="POST">
                <input type="hidden" name="id" id="idUsuarioEliminar">
                <button type="submit" class="BtnEliminarConfirmar">Confirmar</button>
                <button type="button" onclick="cerrarModalEliminar()">Cancelar</button>
            </form>
        </div>
    </div>

</div>

<!-- JavaScript -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../../../assets/JS/script.js" defer></script>
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
</body>
</html>
