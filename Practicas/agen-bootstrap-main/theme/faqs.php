<?php
include("./components/header.php");
?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container-fluid w-75 d-flex justify-content-center">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Apartado de FAQS</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- faqs -->
<section class="section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="accordion">
          <?php
          // Consulta SQL para obtener las FAQs
          $faqs_query = "SELECT * FROM FAQS";
          $result = $mysqli->query($faqs_query);

          // Verificar si hay resultados
          if ($result && $result->num_rows > 0) {
            $counter = 1; // Contador para los IDs de los acordeones
            while ($faq = $result->fetch_assoc()) {
              echo '
              <!-- accordion item -->
              <div class="card mb-4 rounded-0 border-0">
                <div class="card-header rounded-0 bg-white border p-0 border-0">
                  <a class="card-link h4 d-flex tex-dark mb-0 py-3 px-4 justify-content-between" data-toggle="collapse" href="#accordion' . $counter . '">
                    <span>' . htmlspecialchars($faq['question']) . '</span> <i class="ti-plus text-right"></i>
                  </a>
                </div>
                <div id="accordion' . $counter . '" class="collapse" data-parent="#accordion">
                  <div class="card-body font-secondary text-color">' . htmlspecialchars($faq['answer']) . '</div>
                </div>
              </div>';
              $counter++; // Incrementar el contador para el siguiente ID
            }
          } else {
            echo '<div class="col-12 text-center"><p>No hay preguntas frecuentes disponibles en este momento.</p></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /faqs -->
 
<?php

include("./components/footer.php");

?>