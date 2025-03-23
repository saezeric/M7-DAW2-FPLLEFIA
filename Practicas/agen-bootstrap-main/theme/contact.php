<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover position-relative" style="background-image: url('https://images.pexels.com/photos/1181719/pexels-photo-1181719.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.05);"></div>
    <div class="container-fluid w-75 d-flex justify-content-center">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Contacta con Nosotros</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- Formulario de Contacto -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="bg-white p-5 rounded shadow">
          <h2 class="mb-4">¿Tienes alguna pregunta?</h2>
          <p class="mb-4">Estamos aquí para ayudarte. Completa el formulario y nos pondremos en contacto contigo lo antes posible.</p>

          <!-- Formulario -->
          <form action="" method="POST">
            <div class="form-group mb-4">
              <label for="name" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Ej: Juan Pérez" required>
            </div>

            <div class="form-group mb-4">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Ej: juan.perez@example.com" required>
            </div>

            <div class="form-group mb-4">
              <label for="subject" class="form-label">Asunto</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Ej: Consulta sobre cursos de IA" required>
            </div>

            <div class="form-group mb-4">
              <label for="course" class="form-label">Curso de interés</label>
              <select class="form-control" id="course" name="course">
                <option value="">Selecciona un curso</option>
                <option value="Curso de ChatGPT">Curso de ChatGPT</option>
                <option value="Ofimática con IA">Ofimática con IA</option>
                <option value="Marketing Digital con IA">Marketing Digital con IA</option>
                <option value="SEO con IA">SEO con IA</option>
                <option value="Contenido Audiovisual con IA">Contenido Audiovisual con IA</option>
                <option value="Automatización de procesos con Make">Automatización de procesos con Make</option>
              </select>
            </div>

            <div class="form-group mb-4">
              <label for="message" class="form-label">Mensaje</label>
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Formulario de Contacto -->

<?php
include("./components/footer.php");
?>