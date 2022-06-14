<main class="contenedor seccion">
    <h1>Registrar vendedores</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="/vendedores/guardar" class="formulario" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" value="Registrar vendedor" class="boton boton-verde">
    </form>
</main>