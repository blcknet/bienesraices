<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="/propiedades/update?id=<?php echo $propiedad->id ?>" class="formulario" enctype="multipart/form-data">
        <?php include 'formulario.php' ?>
        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>