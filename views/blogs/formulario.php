<fieldset>
    <legend>Crear un nuevo blog</legend>
    <label for="titulo">Titulo:</label>
    <input name="titulo" type="text" id="titulo" placeholder="Titulo del blog" value="<?php echo s($blog->title) ?>">

    <label for="imagen">Imagen del blog:</label>
    <input name="imagen" type="file" id="imagen" accept="image/*">
    <?php if ($blog->image) { ?>
        <img class="imagen-small" src="/imagenes/<?php echo $blog->image ?>" alt="">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $blog->description ?></textarea>
</fieldset>