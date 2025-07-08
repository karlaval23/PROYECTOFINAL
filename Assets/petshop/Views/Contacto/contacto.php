<?=headerCliente();?>
<?=navCliente();?>

<br><main id="main">
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>CONTACTO</h2>
            <p>¿Necesitas ayuda? <span>Contáctenos</span></p>
        </div>
        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d817.4196595622518!2d-76.38272973722286!3d-12.951036981521511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1715664325286!5m2!1ses!2spe" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="row gy-4">
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Dirección</h3>
                        <p>Av.Lima #323</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Correo</h3>
                        <p>agroveterinariamalenic323@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Celular</h3>
                        <p>+51 917 110 996</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Horario</h3>
                        <div><strong>Lunes-Viernes:</strong> 8AM-8PM;
                            <strong>Sabados:</strong> 8AM - 1PM
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?=BASE_URL?>contacto/enviar" method="post" role="form" class="php-email-form p-3 p-md-4 mt-4">
            <div class="row">
                <div class="col-xl-6 form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-xl-6 form-group">
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" rows="5" placeholder="Mensaje" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Tu mensaje ha sido enviado. Gracias!</div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
        </form>
    </div>
</section>
</main>

<?=footerCliente();?>