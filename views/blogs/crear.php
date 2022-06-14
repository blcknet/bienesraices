<main class="contenedor seccion">
    <h1>Crear blog</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="/blogs/store" class="formulario" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" value="Crear blog" class="boton boton-verde">
    </form>
</main>