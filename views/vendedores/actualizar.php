<main class="contenedor seccion" >
    <h1>Actualizar Vendedor</h1>
    <a href="/admin" class="boton boton-amarillo">Volver a Admin</a>
    <?php foreach ($errores as $error): ?> 
        <div class="alerta error">
        <?php echo $error;
 ?> 
        </div>
    <?php endforeach;?>


<form class="formulario" method="POST">
        <!-- MUY NECESARIO EL MULTIPART, ES LO QUE NOS PERMITE LEER LOS ARCHIVOS QUE SE SUBEN A UN SITIO -->

        <?php include "formulario.php";?>

            <input type="submit" class="boton boton-verde" value="Actualizar Vendedor">
    </form>
</main>