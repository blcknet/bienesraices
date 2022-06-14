<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php if ($mensaje) : ?>
        <p class="alerta exito"><?php echo $mensaje ?></p>
    <?php endif; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3" alt="imagen contacto" loading="lazy">
    </picture>

    <h2 data-cy="heading-formulario">Llena el formulario</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="nombre">

            <label data-cy="input-mensaje" for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="vende">Vende o compra</label>
            <select data-cy="input-opciones" name="tipo" id="vende">
                <option value="" disabled selected>Seleccione</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input data-cy="input-precio" type="number" placeholder="Tu presupuesto" id="presupuesto" name="presupuesto">

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input data-cy="forma-contacto" type="radio" id="contactar-telefono" value="telefono" name="contacto">

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" id="contactar-email" value="email" name="contacto">
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input class="boton-verde" type="submit" value="Enviar datos">
    </form>
</main>