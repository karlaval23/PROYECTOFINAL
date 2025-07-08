<?=headerCliente();?>
<?=navCliente();?>
<?php
// Extrae los datos enviados por el controlador para evitar
// avisos de variables indefinidas en entornos estrictos
$categorias = $data['categorias'] ?? [];
$productos  = $data['productos'] ?? [];
?>
<br>
<section id="menu" class="menu">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>TIENDA VIRTUAL</h2>
      <p>PETSHOP <span>Malenic</span></p>
    </div>
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <?php foreach($categorias as $i => $cat){ ?>
      <li class="nav-item">
        <a class="nav-link <?= $i==0 ? 'active show' : '' ?>" data-bs-toggle="tab" data-bs-target="#cat<?= $cat['idcategoria'] ?>">
          <h4><?= htmlspecialchars($cat['nombre']) ?></h4>
        </a>
      </li>
      <?php } ?>
    </ul>
    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
      <?php foreach($categorias as $i => $cat){ ?>
      <div class="tab-pane fade <?= $i==0 ? 'active show' : '' ?>" id="cat<?= $cat['idcategoria'] ?>">
        <div class="tab-header text-center">
          <p>Productos</p>
          <h3><?= htmlspecialchars($cat['nombre']) ?></h3>
        </div>
        <div class="row gy-5">
          <?php foreach($productos as $prod){ if($prod['categoriaid'] == $cat['idcategoria']){ ?>
          <div class="col-lg-4 menu-item" data-id="<?= $prod['idproducto'] ?>">
            <a href="<?= mediaCliente(); ?>img_petshop/<?= htmlspecialchars($prod['imagen']) ?>" class="glightbox">
              <img src="<?= mediaCliente(); ?>img_petshop/<?= htmlspecialchars($prod['imagen']) ?>" class="menu-img img-fluid" alt="">
            </a>
            <h4><?= htmlspecialchars($prod['nombre']) ?></h4>
            <p class="ingredients">
              <?= htmlspecialchars($prod['descripcion']) ?>
            </p>
            <p class="price">
              S/<?= number_format($prod['precio'],2) ?>
            </p>
            <button class="boton-item" data-id="<?= $prod['idproducto'] ?>">Agregar al Carrito</button>
          </div>
          <?php }} ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.menu-item .boton-item').forEach(btn=>btn.addEventListener('click', agregarAlCarritoClicked));
    document.querySelectorAll('.menu-item h4').forEach(el=>el.classList.add('titulo-item'));
    document.querySelectorAll('.menu-item .price').forEach(el=>el.classList.add('precio-item'));
    document.querySelectorAll('.menu-item img').forEach(el=>el.classList.add('img-item'));
  });
</script>
<?=footerCliente();?>