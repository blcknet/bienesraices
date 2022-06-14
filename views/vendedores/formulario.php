<fieldset>
    <legend>Informacion general de la propiedad</legend>
    <label for="nombre">Nombre:</label>
    <input name="nombre" type="text" id="nombre" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre) ?>">

    <label for="apellido">Apellido:</label>
    <input name="apellido" type="text" id="apellido" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido) ?>">

    <label for="imagen">Imagen del vendedor:</label>
    <input name="imagen" type="file" id="imagen" accept="image/*">
    <?php if ($vendedor->imagen) { ?>
        <img class="imagen-small" src="/imagenes/<?php echo $vendedor->imagen ?>" alt="">
    <?php } ?>

    <label for="telefono">Telefono del vendedor:</label>
    <input type="number" id="telefono" name="telefono" placeholder="Ej. 5511223344 (10 caracteres)" value="<?php echo s($vendedor->telefono) ?>">
</fieldset>