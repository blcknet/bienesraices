<main class="contenedor seccion">
    <h1>Editar vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="/vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="formulario" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" value="Actualizar vendedor" class="boton boton-verde">
    </form>
</main>