<fieldset>
    <legend>Informacion general de la propiedad</legend>
    <label for="titulo">Titulo de la propiedad:</label>
    <input name="titulo" type="text" id="titulo" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo) ?>">

    <label for="precio">Precio de la propiedad:</label>
    <input name="precio" type="number" id="precio" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio) ?>">

    <label for="imagen">Imagen de la propiedad:</label>
    <input name="imagen" type="file" id="imagen" accept="image/*">
    <?php if ($propiedad->imagen) { ?>
        <img class="imagen-small" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="">
    <?php } ?>

    <label for="descripcion">Descripcion de la propiedad:</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="habitacion">Habitaciones de la propiedad:</label>
    <input name="habitacion" type="number" id="habitacion" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">

    <label for="wc">Baños de la propiedad:</label>
    <input name="wc" type="number" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamiento de la propiedad:</label>
    <input name="estacionamiento" type="number" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id" id="vendedor">
        <option value="" selected disabled>Selecciona un vendedor</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option value="<?php echo s($vendedor->id) ?>" <?php echo $propiedad->vendedores_id == $vendedor->id ? ' selected' : ''  ?>><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>