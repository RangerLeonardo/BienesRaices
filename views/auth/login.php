<main>
    <h1 data-cy="heading-login">Iniciar Sesión</h1>


    <?php foreach ($errores as $error) : ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach;   ?>

    <form data-cy="formulario-login" method="POST" class="formulario contenido-centrado" action="/login">
        <fieldset>
            <legend>Email y Password</legend>


            <label for="correoAutenticación">E-mail</label>
            <input type="email" name="email" placeholder="Correo electrónico" id="correoAutenticación">

            <label for="contraseña">Contraseña</label>
            <input type="password" name="password" id="contraseña">

        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">



    </form>

</main>