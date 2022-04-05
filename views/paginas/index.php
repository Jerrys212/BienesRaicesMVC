<main class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en venta</h2>

    <?php

    $limite = 3;

    include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a class="boton-verde" href="/propiedades">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam, odio
        possimus. Eum repellendus nobis accusamus ex. Vel quis animi a
        necessitatibus. Eum et, officia debitis odio harum voluptate possimus
        aliquam?
    </p>
    <a href="contacto.php" class="boton-amarillo"> Contactanos </a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp" />
                    <source srcset="build/img/blog1.jpg" type="image/jpeg" />
                    <img src="build/img/blog1.jpg" alt="Entrada Blog" loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para construir una teraaza en el techo de tu casa con
                        los mejores materiales y ahorrando dinero
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp" />
                    <source srcset="build/img/blog2.jpg" type="image/jpeg" />
                    <img src="build/img/blog2.jpg" alt="Entrada Blog" loading="lazy" />
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hohar con esta guia aprende as
                        combinar muebles y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma muy buena atencion y
                la casa que me ofrecieron cumple con mis expectativas
            </blockquote>
            <p>- Gerardo Garcia</p>
        </div>
    </section>
</div>