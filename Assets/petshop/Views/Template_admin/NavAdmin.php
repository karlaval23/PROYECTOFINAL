<!-- <body class="app sidebar-mini">
   Navbar
    <header class="app-header"><a class="app-header__logo" href="<?= base_url(); ?>dashboard">Tienda</a>
      Sidebar toggle button<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      Navbar Right Menu
      <ul class="app-nav">

        User Menu
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= base_url(); ?>opciones"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>perfil"><i class="bi bi-person me-2 fs-5"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>logout"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    Sidebar menu
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url(); ?>dashboard"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-people-fill"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>usuarios"><i class="bi bi-people-fill"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>roles"><i class="icon bi bi-file-earmark-fill"></i> Roles</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>permisos"><i class="icon bi bi-shield-fill"></i> Permisos</a></li>
          </ul>
        </li>     
        <li><a class="app-menu__item" href="<?= base_url(); ?>clientes"><i class="app-menu__icon bi bi-person-fill-exclamation"></i><span class="app-menu__label">Clientes</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>productos"><i class="app-menu__icon bi bi-box-seam-fill"></i><span class="app-menu__label">Productos</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>pedidos"><i class="app-menu__icon bi bi-person-lines-fill"></i><span class="app-menu__label">Pedidos</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>logout"><i class="app-menu__icon bi bi-box-arrow-left"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside> -->


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/imgCliente/logo.png" alt="">
        <span class="d-none d-lg-block">MALENIC</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

  <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item">
          <a class="nav-link nav-icon" href="<?= base_url(); ?>">
            <i class="bi bi-shop"></i>
          </a>
        </li>



        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">User de ingreso</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Username - lastname</h6>
              <span>Rol</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Configuracion</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
    <!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url(); ?>usuarios">
              <i class="bi bi-circle"></i><span>Usuarios</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>roles">
              <i class="bi bi-circle"></i><span>Roles</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url(); ?>productos">
              <i class="bi bi-circle"></i><span>Productos</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>categorias">
              <i class="bi bi-circle"></i><span>Categorias</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>proveedores">
              <i class="bi bi-circle"></i><span>Proveedores</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>pedidos">
          <i class="bi bi-grid"></i>
          <span>Pedidos</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->