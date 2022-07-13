<?php
if(!isset($_SESSION)){
    session_start();
}
$auth=$_SESSION["login"] ?? false;
?>

<!-- header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body> 
<header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra"> 
                <a href="/" class="logo">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                
                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="/build/img/barras.svg" alt="Icono Menu">
                    </a>
                </div>

                <div class="mover">
                        <img src="/build/img/dark-mode.svg" alt="boton para modo oscuro" class="dark-mode-boton">
                         <nav class="navegacion" id="navegacion">
                         <a href="/nosotros.php">Nosotros</a>
                         <a href="/anuncios.php">Anuncios</a>
                         <a href="/blog.php">Blog</a>
                         <a href="/contacto.php">Contacto</a>

                         <?php if (!$auth) : ?>
                             <a href="/login.php">Iniciar Sesion</a>
                        <?php endif; ?>

                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>

                    </nav>
                </div>
            <!-- AQUÍ TERMINA LA BARRA -->
            </div>

            <?php 
                if($inicio){
                    echo '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>';
                }
            ?>

    </header>