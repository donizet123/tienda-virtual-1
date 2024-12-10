<?php include_once 'Views/template/headerPrincipal.php'; ?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Ubicanos</h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <div class="container">
    <h1>Contacto</h1>
    <form id="contactForm" action="<?php echo BASE_URL; ?>Principal/sendContactEmail" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>


    <!-- Start Map -->
<!-- Start Google Map -->
<div style="margin-top: 20px;">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31218.096460759007!2d-76.906496!3d-12.025471300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1732856587878!5m2!1ses-419!2spe" 
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
<!-- End Google Map -->

<!-- Start Contact -->
<div class="container py-5">
    <!-- Aquí puedes agregar el contenido de la sección de contacto -->
</div>
<!-- End Contact -->



    <?php include_once 'Views/template/footerPrincipal.php'; ?>

</body>

</html>