<?php
include './components/header.php';
?>

<!-- Main Content -->
<div class="main-content">
  <!-- Encabezado del Proyecto -->
  <section class="container mt-5">
    <h1 class="text-center mb-4">Nombre del Proyecto</h1>
    <p class="text-center">
      Una breve descripción del proyecto y su propósito.
    </p>
  </section>

  <!-- Sección de Descripción General -->
  <section class="container mt-5">
    <h2>Descripción General</h2>
    <p>
      Aquí puedes describir en qué consiste el proyecto, sus objetivos y su
      relevancia.
    </p>
  </section>

  <!-- Sección de Tecnologías Utilizadas -->
  <section class="container mt-5">
    <h2>Tecnologías Utilizadas</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tecnología 1</h5>
          <p class="card-text">Descripción breve de la tecnología.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tecnología 2</h5>
          <p class="card-text">Descripción breve de la tecnología.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tecnología 3</h5>
          <p class="card-text">Descripción breve de la tecnología.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de Conocimientos Aprendidos -->
  <section class="container mt-5">
    <h2>Conocimientos Aprendidos</h2>
    <p>
      Describe los conocimientos que adquiriste durante el desarrollo del
      proyecto.
    </p>
  </section>

  <!-- Sección de Funcionalidades -->
  <section class="container mt-5">
    <h2>Funcionalidades</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Funcionalidad 1</h5>
          <p class="card-text">Descripción breve de la funcionalidad.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Funcionalidad 2</h5>
          <p class="card-text">Descripción breve de la funcionalidad.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Funcionalidad 3</h5>
          <p class="card-text">Descripción breve de la funcionalidad.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección de Guía de Estilos -->
  <section class="container mt-5">
    <h2>Guía de Estilos</h2>
    <p>
      Explica las decisiones de diseño, colores, tipografías y estilos
      utilizados en el proyecto.
    </p>
  </section>

  <!-- Sección de Explicación del Funcionamiento -->
  <section class="container mt-5">
    <h2>Explicación del Funcionamiento</h2>
    <p>
      Describe cómo funciona el proyecto desde un punto de vista técnico.
    </p>
  </section>

  <!-- Sección de Demo Integrada -->
  <section class="container mt-5">
    <h2>Demo del Proyecto</h2>
    <iframe
      src="https://proyecto-tetrissaez-eric.vercel.app"
      width="100%"
      height="1000px"
      style="border: none; border-radius: 10px"></iframe>
  </section>

  <!-- Enlace al Repositorio -->
  <section class="container mt-5 text-center">
    <a
      href="https://github.com/saezeric/proyectoTetris_SaezEric"
      class="btn btn-primary"
      target="_blank">Ver Repositorio en GitHub</a>
  </section>

  <?php
  include './components/footer.php';
  ?>