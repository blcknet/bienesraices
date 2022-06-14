<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form data-cy="formulario-login" class="formulario" method="POST" action="/login" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Tu password" id="password" name="password" required>
        </fieldset>

        <input class="btn boton-verde" type="submit" value="Enviar">
    </form>
</main>