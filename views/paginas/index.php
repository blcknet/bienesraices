<main class="contenedor seccion">
    <h2 data-cy="iconos-nosotros">Más acerca de nosotros</h2>

    <?php include 'includes/iconos.php' ?>
</main>

<section class="contenedor seccion">
    <h2>Casas y depas en venta</h2>

    <?php
    $limite = 3;
    include 'listado.php'; ?>

    <div class="alinear-derecha">
        <a href="/anuncios" data-cy="ver-propiedades" class="boton-verde">Ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2 data-cy="contacto-index">Encuentra la casa de tus sueños</h2>
    <p data-cy="parrafo-contacto-index">LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a data-cy="boton-contacto" href="/contacto" class="boton-amarillo">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog" data-cy="blog">
        <h3>Nuestro blog</h3>

        <?php foreach ($blogs as $blog) : ?>
            <?php include 'includes/blog.php' ?>
        <?php endforeach; ?>
    </section>

    <section class="testimoniales" data-cy="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam minima veritatis adipisci laborum nisi, unde nihil hic doloribus nulla accusantium dolorum consequuntur tempora, earum nemo sed iste itaque, harum sapiente.
            </blockquote>
            <p>-Luis olvera</p>
        </div>
    </section>
</div>