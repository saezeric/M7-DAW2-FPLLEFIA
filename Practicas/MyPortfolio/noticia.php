<?php
include './components/header.php';
?>

<!-- Main Content -->
<div class="main-content">
  <!-- Encabezado de la Noticia -->
  <section class="container mt-5">
    <h1 class="text-center mb-4">Título de la Noticia</h1>
    <p class="text-center">
      Un breve resumen de la noticia.
    </p>
  </section>

  <!-- Sección de Detalles de la Noticia -->
  <section class="container mt-5">
    <h2>Detalles de la Noticia</h2>
    <p>
      Aquí puedes describir los detalles completos de la noticia, incluyendo
      los eventos, fechas y cualquier información relevante.
    </p>
  </section>

  <!-- Sección de Imágenes Relacionadas -->
  <section class="container mt-5">
    <h2>Imágenes Relacionadas</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body">
          <img src="https://via.placeholder.com/150" alt="Imagen 1" class="img-fluid" />
          <p class="card-text mt-2">Descripción breve de la imagen.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <img src="https://via.placeholder.com/150" alt="Imagen 2" class="img-fluid" />
          <p class="card-text mt-2">Descripción breve de la imagen.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <img src="https://via.placeholder.com/150" alt="Imagen 3" class="img-fluid" />
          <p class="card-text mt-2">Descripción breve de la imagen.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de Entrevistas o Declaraciones -->
  <section class="container mt-5">
    <h2>Entrevistas o Declaraciones</h2>
    <p>
      Incluye citas o declaraciones de personas relevantes relacionadas con
      la noticia.
    </p>
  </section>

  <!-- Sección de Impacto y Reacciones -->
  <section class="container mt-5">
    <h2>Impacto y Reacciones</h2>
    <p>
      Describe el impacto de la noticia y las reacciones de la comunidad o
      de las personas involucradas.
    </p>
  </section>

  <!-- Sección de Información Adicional -->
  <section class="container mt-5">
    <h2>Información Adicional</h2>
    <p>
      Proporciona cualquier información adicional que pueda ser relevante
      para los lectores.
    </p>
  </section>

  <!-- Sección de Visualización de Comentarios -->
  <section class="container mt-5">
    <h2>Comentarios</h2>
    <textarea
      class="form-control"
      placeholder="Escribe tu comentario..."
      rows="4"></textarea>
    <button type="submit" class="btn btn-primary mt-3">
      Enviar Comentario
    </button>
    </form>
    <div class="mt-5">
      <div class="comment d-flex align-items-start">
        <img src="https://img.freepik.com/vector-gratis/circulo-azul-usuario-blanco_78370-4707.jpg" alt="Usuario 1" class="me-3 rounded-circle" style="width: 50px; height: 50px;" />
        <div>
          <p><strong>Usuario 1:</strong> Este es un comentario de ejemplo.</p>
        </div>
      </div>
      <div class="comment reply d-flex align-items-start ms-5">
        <img src="https://img.freepik.com/vector-gratis/circulo-azul-usuario-blanco_78370-4707.jpg" alt="Usuario 2" class="me-3 rounded-circle" style="width: 50px; height: 50px;" />
        <div>
          <p><strong>Usuario 2:</strong> Esta es una respuesta al comentario de ejemplo.</p>
        </div>
      </div>
      <div class="comment d-flex align-items-start">
        <img src="https://img.freepik.com/vector-gratis/circulo-azul-usuario-blanco_78370-4707.jpg" alt="Usuario 3" class="me-3 rounded-circle" style="width: 50px; height: 50px;" />
        <div>
          <p><strong>Usuario 3:</strong> Otro comentario de ejemplo.</p>
        </div>
      </div>
    </div>
  </section>

  <?php
  include './components/footer.php';
  ?>