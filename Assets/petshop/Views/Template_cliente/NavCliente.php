<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="<?= base_url(); ?>" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Malenic<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=base_url();?>">Inicio</a></li>
          <li><a href="<?=base_url();?>nosotros">Nosotros</a></li>

          <!-- lista productos -->
          <li ><a href="<?=base_url();?>produc"><span>Productos</span></a></li>

          <!-- lista citas -->
          <li class="dropdown"><a href="<?=base_url();?>Citas"><span>Citas</span> </a>
              
          </li>
          <li><a href="<?=base_url();?>contacto">Contactos</a></li>
        </ul>
      </nav><!-- .navbar -->

        <!-- Enlace para el ícono de persona -->
        <a href="<?=base_url();?>dashboard" style="font-size: 30px;">
            <i class="bi bi-person-fill-lock"></i>
        </a>

        <!-- Enlace para el ícono de carrito -->
<a href="<?=base_url();?>carrito" id="ver-carrito" style="font-size: 30px;">
            <i class="bi bi-cart"></i>
        </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <?php carritoCliente(); ?>

