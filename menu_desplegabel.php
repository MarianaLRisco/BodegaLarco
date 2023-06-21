<div class="col-auto sidebar col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark flex-column min-vh-100" data-bs-toggle="sidebar" id="sidebar">
            <div href="/" class="d-flex align-items-center link-dark text-decoration-none border-bottom">
                <img src="imagenes/sinfoto.png" alt="" width="52" height="52" class="rounded-circle me-2">
                <p class='text-light text-center order-2'><?php echo $_SESSION['nombre'] ?><br><?php echo $_SESSION['rol'] ?></p>
            </div>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a href="inicio.php" class="nav-link align-middle px-0">
                        <ion-icon name="home"></ion-icon><span class="ms-1 d-none d-sm-inline">Inicio</span>
                    </a>
                </li>
                <?php if ($_SESSION['rol'] == 1) : ?>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-circle-user"></i><span class="ms-1 d-none d-sm-inline">Usuarios</span>
                        </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="Registrar_Usuarios.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar Usuario</span></a>
                            </li>
                            <li>
                                <a href="Listar_usuarios.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista de Usuarios</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <?php endif; ?>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fa-solid fa-user-group"></i><span class="ms-1 d-none d-sm-inline">Clientes</span>
                    </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="Registrar_clientes.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar Cliente</span></a>
                        </li>
                        <li>
                            <a href="Listar_clientes.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista de Clientes</span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-chalkboard-user"></i><span class="ms-1 d-none d-sm-inline">Proveedores</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="Registrar_proveedores.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar
                                        Proveedor</span></a>
                            </li>
                            <li>
                                <a href="Listar_proveedores.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista de Proveedores</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <ion-icon name="grid-outline"></ion-icon><span class="ms-1 d-none d-sm-inline">Productos</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="Registrar_productos.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar
                                        Producto</span></a>
                            </li>
                            <li>
                                <a href="Listar_productos.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista de Productos</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa-solid fa-chart-line"></i><span class="ms-1 d-none d-sm-inline">Ventas</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="Registrar_ventas.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar Venta</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Lista de Ventas</span></a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>