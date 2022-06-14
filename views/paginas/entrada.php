<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $blog->title ?></h1>

    <picture>
        <source srcset="/imagenes/<?php echo $blog->image ?>" type="image/webp">
        <source srcset="/imagenes/<?php echo $blog->image ?>" type="image/jpeg">
        <img class="imagen-blog" src="/imagenes/<?php echo $blog->image ?>" alt="destacada" loading="lazy">
    </picture>

    <p class="informacion-meta">Escrito el: <span><?php echo $blog->created ?></span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">
        <p><?php echo $blog->description ?></p>
    </div>
    <div class="alinear-derecha">
        <a class="boton boton-verde" href="/blog">Volver</a>
    </div>
</main>