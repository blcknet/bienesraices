<article class="entrada-blog">
    <div class="imagen">
        <picture>
            <source srcset="/imagenes/<?php echo $blog->image ?>" type="image/webp">
            <source srcset="/imagenes/<?php echo $blog->image ?>" type="image/jpeg">
            <img src="/imagenes/<?php echo $blog->image ?>" alt="entrada blog 1">
        </picture>
    </div>
    <div class="texto-entrada">
        <a href="/entrada?id=<?php echo $blog->id ?>">
            <h4><?php echo $blog->title ?></h4>
        </a>
        <p class="informacion-meta">Escrito el: <span><?php echo $blog->created ?></span> por: <span>Admin</span></p>

        <p><?php echo $blog->description ?></p>
    </div>
</article>