<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo ?></h1>

    <picture>
        <source srcset="/imagenes/<?php echo $propiedad->imagen ?>" type="image/webp">
        <source srcset="/imagenes/<?php echo $propiedad->imagen ?>" type="image/jpeg">
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="destacada" loading="lazy">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $propiedad->precio ?></p>

        <ul class="iconos-caracteristicas">
            <li><img class="icono" src="/build/img/icono_wc.svg" alt="wc"><?php echo $propiedad->wc ?></li>
            <li><img class="icono" src="/build/img/icono_dormitorio.svg" alt="dormitorio"><?php echo $propiedad->habitaciones ?></li>
            <li><img class="icono" src="/build/img/icono_estacionamiento.svg" alt="estacionamiento"><?php echo $propiedad->estacionamiento ?></li>
        </ul>
        <p><?php echo $propiedad->descripcion ?></p>
    </div>
    <div class="alinear-derecha">
        <a class="boton-verde" href="/anuncios">Volver</a>
    </div>
</main>