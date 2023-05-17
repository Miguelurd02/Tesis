<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LARIA</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/agente-inmobiliario.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('assets/css/home/estilos.css') }}" />
        <!-- Estilos sin bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/css/home/estiloshome.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/home/acordeon.css') }}" />
        <!-- Animate AOS -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <!-- Estilos Acordeon -->
        <link rel="stylesheet" href="assets/css/acordeon.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="barra--nav navbar navbar-expand-lg navbar-dark">
            <div class="container px-5">
                <img class="icon" src="{{ asset('assets/img/img2/agente-inmobiliario.png') }}" alt="">
                <a class="navbar-brand" href="#!">LARIA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inscríbete hoy</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="/auth/login-basic">Iniciar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link" href="/auth/register-basic">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="hero bg-dark py-5">
            <div class="container px-5" data-aos="fade-up">
                <div class="hero--title row gx-5 justify-content-start">
                    <div class="col-lg-6">
                        <div class="my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Tu inmobiliaria ideal,</h1>
                            <h1 class="display-5 fw-bolder text-white mb-2">para tu propiedad de ensueño</h1>
                            <p class="text--hero lead text-white mb-4">Encuentra la propiedad de tus sueños, y la inmobiliaria que mejor se adapte a ti.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-start">
                                <a class="btn btn--inscribete btn-primary btn-lg px-4 me-sm-3" href="iniciarsesionusuario.html">Comenzar</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#features">Descubre Laria</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5" data-aos="fade-up">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0 d-flex flex-column align-items-center">
                        <div class="icons--features feature text-white rounded-3 mb-3"><i class="icons--features bi bi-house-door"></i></div>
                        <h2 class="h4 fw-bolder">Variedad de propiedades </h2>
                        <p class="text-center">Gran cantidad de opciones de propiedades a tu elección con diversas características, para que puedas escoger la que mejor se adapte ti.</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 d-flex flex-column align-items-center">
                        <div class="icons--features feature text-white rounded-3 mb-3"><i class="icons--features bi bi-map"></i></div>
                        <h2 class="h4 fw-bolder">Información centralizada</h2>
                        <p class="text-center">En nuestra página encontrarás opciones de no solo una, sino muchas inmobiliarias, proporcionandote la ventaja de poder encontrar todas las opciones en un solo lugar.</p>
                    </div>
                    <div class="col-lg-4 d-flex flex-column align-items-center">
                        <div class="icons--features feature text-white rounded-3 mb-3"><i class="icons--features bi bi-star"></i></div>
                        <h2 class="h4 fw-bolder">Perfil Propio</h2>
                        <p class="text-center">La página te hará recomendaciones de acuerdo a lo que busques para que elijas la mejor opción posible, además cuentas con un apartado en el perfil en donde se guardarán las que marques como favoritas</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">LARIA: búsqueda de propiedades de la mano de las inmobiliarias más demandadas</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <img class="image--guy" src="{{ asset('assets/img/img2/foto-de-laria.png') }}" alt="">
            </div>
        </section>
        <!-- Testimonials section-->
        <section class="py-5">
            <div class="container px-5 my-5 px-5" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Opiniones de quienes han usado nuestra página</h2>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="cards d-flex">
                        <!-- Testimonial 1-->
                        <div class="card">
                            <div class="header--card">
                                <img src="{{ asset('assets/img/img2/testimonials-1.jpeg') }}" alt="">
                            </div>
                            <div class="body--card">
                                <p class="subtitle">Maria Jose</p>
                                <p>"La plataforma es muy completa y con contenido de alto valor. Las propiedades son muy llamativas, es chevere tener esa interacción, eso es algo muy positivo"</p>
                                <p class="subtitle">Maracaibo | Venezuela</p>
                            </div>
                           <!-- <div class="footer--card">
                                <i class="bi bi-shop"></i>
                                <p>Marketing Digital</p>
                            </div> 2-->
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card">
                            <div class="header--card">
                                <img src="{{ asset('assets/img/img2/testimonials-2.jpeg') }}" alt="">
                            </div>
                            <div class="body--card">
                                <p class="subtitle">Carlos Rodriguez</p>
                                <p>"Me gusta mucho la pagina, se me hace excelente ya que puedo buscar entre diferentes inmobiliarias al mismo tiempo"</p>
                                <p class="subtitle">Maracaibo | Venezuela</p>
                            </div>
                                 <!-- <div class="footer--card">
                                <i class="bi bi-shop"></i>
                                <p>Marketing Digital</p>
                            </div> 2-->
                        </div>
                        <!-- Testimonial 3-->
                        <div class="card">
                            <div class="header--card">
                                <img src="{{ asset('assets/img/img2/testimonials-3.jpeg') }}" alt="">
                            </div>
                            <div class="body--card">
                                <p class="subtitle">Andrea Sutherland</p>
                                <p>"Lo que más me gusta es el dinamismo de la página, me muestra opciones incluso mejores que las que estaba buscando"</p>
                                <p class="subtitle">Valencia | Venezuela</p>
                            </div>
                          <!-- <div class="footer--card">
                                <i class="bi bi-shop"></i>
                                <p>Marketing Digital</p>
                            </div> 2-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Acordeon questions section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5" data-aos="fade-up">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">¿Dudas? ¡Acláralas con nuestras
                        preguntas frecuentes!</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="half">
                    <!-- question 1 -->
                    <div class="tab">
                        <input id="tab-one" type="checkbox" name="tabs">
                        <label for="tab-one">¿Qué es Laria?</label>
                        <div class="tab-content">
                            <p>Laria es una plataforma de venta de inmuebles, en donde podrás encontrar opciones ofrecidas por diferentes inmobiliarias certificadas. Nuestro método se basa en dos objetivos principales:</p>
                            <p>Mostrar la mejor opción: De acuerdo a tu perfil, y a tus búsquedas, se mostrará la mejor opción para que escojas la propiedad de la inmobiliaria que mejor se adecúe a tus necesidades.</p>
                            <p>Centralización: Disfruta de diversas opciones de diferentes inmobiliarias en un solo sitio.</p>
                        </div>
                    </div>
                    <!-- question 2 -->
                    <div class="tab">
                      <input id="tab-two" type="checkbox" name="tabs">
                      <label for="tab-two">¿Cómo puedo registrarme?</label>
                      <div class="tab-content">
                        <p>Ingresa tus datos en el formulario de registro de nuestra web. Luego podrás acceder a todas las funcionalidades que tenemos para ti.</p>
                      </div>
                    </div>
                    <!-- question 3 -->
                    <div class="tab">
                        <input id="tab-three" type="checkbox" name="tabs">
                        <label for="tab-three">¿Cómo funciona la plataforma?</label>
                        <div class="tab-content">
                          <p>Una vez que te registras, a traves de la plataforma podrás encontrar la opción “Buscar Propiedades” que encuentras en el inicio. Luego, deberás especificar las caracteristicas de la propiedad que deseas encontrar y comenzarán a cargar las distintas opciones.</p>
                        </div>
                      </div>
                      <!-- question 4 -->
                    <div class="tab">
                        <input id="tab-four" type="checkbox" name="tabs">
                        <label for="tab-four">¿Qué necesito para utilizar la plataforma Laria?</label>
                        <div class="tab-content">
                          <p>Solo necesitas una computadora, o tablet, y conexión a Internet.</p>
                        </div>
                      </div>
                      <!-- question 5 -->
                    <div class="tab">
                        <input id="tab-five" type="checkbox" name="tabs">
                        <label for="tab-five">¿Cómo puedo registrarme como inmobiliaria?</label>
                        <div class="tab-content">
                          <p>Para registrarte como inmobiliaria, comunícate con nosotros en nuestra información de contacto</p>
                        </div>
                      </div>
                      <!-- question 6 -->
                    <div class="tab">
                        <input id="tab-six" type="checkbox" name="tabs">
                        <label for="tab-six">¿Laria es una plataforma de compra y venta de propiedades para el publico?</label>
                        <div class="tab-content">
                          <p>Laria solo permite vender propiedades de inmobiliarias certificadas, así mismo, Laria solo pone en contacto al cliente con el agente inmobiliario, Laria no realiza ningun tipo de transaccion dentro de la plataforma.</p>
                        </div>
                      </div>
                      <!-- question 7 
                    <div class="tab">
                        <input id="tab-seven" type="checkbox" name="tabs">
                        <label for="tab-seven">¿En cuánto tiempo voy a aprender mis cursos con Flux Academy?</label>
                        <div class="tab-content">
                          <p>En Flux Academy cada cursos tiene sus tiempos de duración que puede variar según el tópico o su modalidad.</p>
                        </div>-->
                      </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Laria</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script>
                AOS.init({
                    delay: 200,
                    duration: 600,
                    once: true,
                });
            </script>
    </body>
</html>

