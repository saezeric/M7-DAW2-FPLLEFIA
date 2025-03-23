<!-- footer -->
<footer class="bg-secondary position-relative">
    <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
    <div class="section">
        <div class="container">
            <div class="row justify-content-center text-center"> <!-- Centrar el contenido -->
                <div class="col-md-4 col-12 mb-4"> <!-- Ajustar el ancho y centrar -->
                    <h4 class="text-white mb-4">Navegación</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-light d-block mb-3">Inicio</a></li>
                        <li><a href="sobre-nosotros.php" class="text-light d-block mb-3">Sobre Nosotros</a></li>
                        <li><a href="noticias.php" class="text-light d-block mb-3">Notícias</a></li>
                        <li><a href="contact.php" class="text-light d-block mb-3">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-12 mb-4"> <!-- Ajustar el ancho y centrar -->
                    <h4 class="text-white mb-4">Cursos</h4>
                    <ul class="list-unstyled">
                        <?php
                        // Consulta SQL para obtener todos los cursos
                        $courses_query = "SELECT id, title, url FROM COURSES";
                        $result = $mysqli->query($courses_query);

                        // Verificar si hay resultados
                        if ($result && $result->num_rows > 0) {
                            // Recorrer cada curso y generar un enlace en el footer
                            while ($course = $result->fetch_assoc()) {
                                echo '<li><a href="curso.php?url=' . $course['url'] . '" class="text-light d-block mb-3">' . $course['title'] . '</a></li>';
                            }
                        } else {
                            // Si no hay cursos, mostrar un mensaje
                            echo '<li><a href="#" class="text-light d-block mb-3">No hay cursos disponibles</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0"> <!-- Ajustar el margen -->
                    <p class="text-light mb-0">Copyright &copy; 2025 MyAI. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-right"> <!-- Centrar en móviles -->
                    <ul class="list-inline text-center text-md-right mb-0">
                        <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
                        <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>

</html>