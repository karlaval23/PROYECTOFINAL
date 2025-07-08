<?=headerCliente();?>
<?=navCliente();?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg"> <!-- Maneja el diseño -->
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" />
        
        
        <h2 data-aos="fade-up">BIENVENIDOS A MALENIC </h2>

          <p data-aos="fade-up" data-aos-delay="100">"Tu PetShop y Veterinaria de confianza, siempre al alcance de tu mascota para brindarle lo mejor."</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">

            <!-- <a href="#book-a-table" class="btn-book-a-table">Book a Table</a> -->
              <a href="https://www.youtube.com/watch?v=-NVHn19CnDY" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i>
                 Ver Video</a>

          <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="<?=mediaCliente();?>pet.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <!-- <main id="main">

   

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <center><div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clientes</p>
            </div>
          </div><!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
              <p>Atención</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p>Productos</p>
            </div>
          </div><!-- End Stats Item -->

        </div></center>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>TIENDA VIRTUAL</h2>
          <p>PETSHOP  <span>Malenic</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Veterinaria</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Alimento</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Petshop</h4>
            </a>
          </li><!-- End tab nav item -->
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Productos</p>
              <h3>Veterinaria</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>Productos_edit" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/lechegato.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>LECHE PARA GATO</h4>
                <p class="ingredients">
                  Presentacion de 120gr
                </p>
                <p class="price">
                  S/15.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/lecheperro.jpg" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/lecheperro.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>LECHE PARA PERRO</h4>
                <p class="ingredients">
                Presentacion de 120gr
                </p>
                <p class="price">
                S/20.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/biberones.jpg" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/biberones.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>BIBERONES</h4>
                <p class="ingredients">
                  50ml
                </p>
                <p class="price">
                S/5.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/curamic.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/curamic.png" class="menu-img img-fluid" alt=""></a>
                <h4>CURAMIC PLATA</h4>
                <p class="ingredients">
                  Presentacion de 290gr
                </p>
                <p class="price">
                S/35.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/k-nino.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/k-nino.png" class="menu-img img-fluid" alt=""></a>
                <h4>K-NINO</h4>
                <p class="ingredients">
                  Presentacion 2 en 1
                </p>
                <p class="price">
                S/40.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/fiproler.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/fiproler.png" class="menu-img img-fluid" alt=""></a>
                <h4>FIPROLER</h4>
                <p class="ingredients">
                  Pipetas para pulgas
                </p>
                <p class="price">
                S/25.00
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Productos</p>
              <h3>Alimento</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/Cambo.jpg" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/Cambo.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>CAMBO CACHORRO</h4>
                <p class="ingredients">
                  Presentación de 7KG
                </p>
                <p class="price">
                  S/75.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/cambo_lata.jpg" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/cambo_lata.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>CAMBO PATE</h4>
                <p class="ingredients">
                  Presentacion Adulto en Lata
                </p>
                <p class="price">
                  S/10.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/LataGato.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/LataGato.png" class="menu-img img-fluid" alt=""></a>
                <h4>RICOCAT PATE</h4>
                <p class="ingredients">
                  Presentación en lata
                </p>
                <p class="price">
                  S/ 7.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/RicocatGato.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/RicocatGato.png" class="menu-img img-fluid" alt=""></a>
                <h4>RICOCAT BOLSA</h4>
                <p class="ingredients">
                  Presentación de 1KG
                </p>
                <p class="price">
                  S/ 12.00                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/RicocanLata.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/RicocanLata.png" class="menu-img img-fluid" alt=""></a>
                <h4>Ricocan Pate</h4>
                <p class="ingredients">
                  Presentación de 330gr
                </p>
                <p class="price">
                 S/ 9.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/RicocanPer.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/RicocanPer.png" class="menu-img img-fluid" alt=""></a>
                <h4>Ricocan en Bolsa</h4>
                <p class="ingredients">
                  Presentación de 1KG
                </p>
                <p class="price">
                  S/ 12.00
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Productos</p>
              <h3>Petshop</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b1.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b1.png" class="menu-img img-fluid" alt=""></a>
                <h4>BEBEDERO DE MANO</h4>
                <p class="ingredients">
                  Diversos colores
                </p>
                <p class="price">
                  S/ 10.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b7.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b7.png" class="menu-img img-fluid" alt=""></a>
                <h4>JUGUETE DE MAIZ</h4>
                <p class="ingredients">
                  Presentacion que se pega al suelo
                </p>
                <p class="price">
                  S/14.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b3.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b3.png" class="menu-img img-fluid" alt=""></a>
                <h4>PLATO I DOG</h4>
                <p class="ingredients">
                  Diversos colores
                </p>
                <p class="price">
                  S/7.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b4.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b4.png" class="menu-img img-fluid" alt=""></a>
                <h4>ZAPATILLAS </h4>
                <p class="ingredients">
                  Tallas XS, S Y M
                </p>
                <p class="price">
                  S/ 15.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b5.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b5.png" class="menu-img img-fluid" alt=""></a>
                <h4>BEBEDERO Y COMEDERO </h4>
                <p class="ingredients">
                  Colores verde y rosado
                </p>
                <p class="price">
                  S/30.00
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="<?= mediaCliente();?>img_petshop/b6.png" class="glightbox"><img src="<?= mediaCliente();?>img_petshop/b6.png" class="menu-img img-fluid" alt=""></a>
                <h4>MOCHILA TRASPORTADORA</h4>
                <p class="ingredients">
                  Material Importado 
                </p>
                <p class="price">
                  S/75.00
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Lunch Menu Content -->

        

        </div>

      </div>
    </section><!-- End Menu Section -->

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>CONTACTO</h2>
          <p>¿Necesitas ayuda? <span>Contáctenos</span></p>
        </div>
    <!-- MAPA -->
        <div class="mb-3">
          <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d817.4196595622518!2d-76.38272973722286!3d-12.951036981521511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1715664325286!5m2!1ses!2spe" frameborder="0" allowfullscreen ></iframe>
          </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Dirección</h3>
                <p>Av.Lima #323</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Correo</h3>
                <p>agroveterinariamalenic323@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Celular</h3>
                <p>+51 917 110 996</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Horario</h3>
                <div><strong>Lunes-Viernes:</strong> 8AM-8PM;
                  <strong>Sabados:</strong> 8AM - 1PM
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 <?=footerCliente();?>