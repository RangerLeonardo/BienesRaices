<main class="contenedor seccion">
        <h2 data-cy="mas-Nosotros">Más Sobre Nosotros</h2>

        <?php include "iconos.php"?>



    <section class="seccion contenedor">
        <h2 data-cy="principal-Propiedades">Casas y Departamentos en Venta</h2>

        
        <?php
          include "listado.php"; 
        ?>


                <div class="alinear-derecha">
                    <a href="/propiedades" class="boton-verde" data-cy="ver-Propiedades">Ver Todo</a>
                </div>
    </section>

    <section class="imagen-contacto" data-cy="imagen-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
            <a href="/contacto" class="boton-amarillo">Contactános</a>

    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
                <h2>Nuestro Blog</h2>
                    <article class="entrada-blog">
                            <div class="imagen">
                                <picture>
                                    <source srcset="build/img/blog1.webp" type="image/webp">
                                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                                    <img loading="lazy" src="/build/img/blog1.jpg" alt="Texto de entrada del blog">
                                </picture>
                            </div>
                            <div class="texto-entrada">
                                <a href="entrada.php">
                                    <h3>Terraza en el techo de tu casa</h3>
                                    <p class="informacion-span">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                                    <p>Consejos para construir una terraza en el techod e tu casa con los mejores materiales y ahorrando dinero</p>
                                </a>
                            </div>
                    </article>
                    <article class="entrada-blog">
                        <div class="imagen">
                            <picture>
                                <source srcset="build/img/blog2.webp" type="image/webp">
                                <source srcset="build/img/blog2.jpg" type="image/jpeg">
                                <img loading="lazy" src="/build/img/blog2.jpg" alt="Texto de entrada del blog">
                            </picture>
                        </div>
                        <div class="texto-entrada">
                            <a href="entrada.php">
                                <h4>Guia para la decoración de tu hogar</h4>
                                <p class="informacion-span">Escrito el <span>20/10/2021</span> por: <span>Admin</span></p>
                                <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio </p>
                            </a>
                        </div>
                </article>
        </section>
        <section data-cy="testimoniales" class="testimoniales">
            <h2>Testimoniales</h2>
                <div class="testimonio">
                    <blockquote>
                       El personal me estafó con una propiedad, me vendía una súper casa en la playa y cuando llegué, era una pinche casa infonavit, para colmo se escuchaba cuando los vecinos cogían
                    </blockquote>
                    <p>-BLAB-</p>
                </div>
        </section>         <!-- Sección del testimonio -->
    </div>

    </main>
