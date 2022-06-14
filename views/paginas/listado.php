<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio" data-cy="anuncio">
            <picture>
                <source srcset="/imagenes/<?php echo $propiedad->imagen ?>" type="image/webp">
                <source srcset="/imagenes/<?php echo $propiedad->imagen ?>" type="image/jpeg">
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio" loading="lazy">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo substr($propiedad->titulo, 0, 15) . '...' ?></h3>
                <p><?php echo substr($propiedad->descripcion, 0, 50) . '...' ?></p>
                <p class="precio">$ <?php echo $propiedad->precio ?></p>
                <ul class="iconos-caracteristicas">
                    <li><img class="icono" src="/build/img/icono_wc.svg" alt="wc"><?php echo $propiedad->wc ?></li>
                    <li><img class="icono" src="/build/img/icono_dormitorio.svg" alt="dormitorio"><?php echo $propiedad->habitaciones ?></li>
                    <li><img class="icono" src="/build/img/icono_estacionamiento.svg" alt="estacionamiento"><?php echo $propiedad->estacionamiento ?></li>
                </ul>

                <a data-cy="enlace-propiedad" href="/anuncio?id=<?php echo $propiedad->id ?>" class="boton boton-amarillo-block">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach; ?>

</div>