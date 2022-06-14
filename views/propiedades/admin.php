<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if ($resultado == 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif ($resultado == 2) : ?>
        <p class="alerta exito">Anuncio Actualizado correctamente</p>
    <?php elseif ($resultado == 3) : ?>
        <p class="alerta exito">Anuncio eliminado correctamente</p>
    <?php elseif ($resultado == 4) : ?>
        <p class="alerta exito">Vendedor eliminado correctamente</p>
    <?php elseif ($resultado == 5) : ?>
        <p class="alerta exito">Vendedor creado correctamente</p>
    <?php elseif ($resultado == 6) : ?>
        <p class="alerta exito">Blog creado correctamente</p>
    <?php elseif ($resultado == 7) : ?>
        <p class="alerta exito">Blog actualizado correctamente</p>
    <?php elseif ($resultado == 8) : ?>
        <p class="alerta exito">Blog eliminado correctamente</p>
    <?php endif; ?>
    <a href="/propiedades/crear" class="boton boton-verde">Crear propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Registrar vendedor</a>
    <a href="/blogs/crear" class="boton boton-amarillo">Crear blog</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr class="centrar-tabla">
                    <td><?php echo $propiedad->id ?></td>
                    <td><?php echo $propiedad->titulo ?></td>
                    <td>
                        <div>
                            <img class="imagen-tabla" src="../imagenes/<?php echo $propiedad->imagen ?> " alt="<?php $propiedad->imagen ?>">
                        </div>
                    </td>
                    <td>$<?php echo $propiedad->precio ?></td>
                    <td>
                        <form method="POST" action="/propiedades/destroy" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr class="centrar-tabla">
                    <td><?php echo $vendedor->id ?></td>
                    <td><?php if ($vendedor->imagen) { ?>
                            <div>
                                <img class="imagen-tabla" src="../imagenes/<?php echo $vendedor->imagen ?>" alt="">
                            </div>
                        <?php } ?>
                    </td>
                    <td><?php echo $vendedor->nombre ?></td>
                    <td><?php echo $vendedor->apellido ?></td>
                    <td><?php echo $vendedor->telefono ?></td>
                    <td>
                        <form method="POST" action="/vendedores/eliminar" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/vendedores/editar?id=<?php echo $vendedor->id ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Blogs</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Titulo</th>
                <th>descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog) : ?>
                <tr class="centrar-tabla">
                    <td><?php echo $blog->id ?></td>
                    <td><?php if ($blog->image) { ?>
                            <div>
                                <img class="imagen-tabla" src="../imagenes/<?php echo $blog->image ?>" alt="">
                            </div>
                        <?php } ?>
                    </td>
                    <td><?php echo $blog->title ?></td>
                    <td><?php echo $blog->description ?></td>

                    <td>
                        <form method="POST" action="/blogs/destroy" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $blog->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/blogs/editar?id=<?php echo $blog->id ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>