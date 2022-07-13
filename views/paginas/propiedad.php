<main class="contenedor seccion contenido-centrado" >
        <h1 data-cy="titulo-Propiedad" ><?php echo $propiedad->titulo; ?></h1>
  
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" loading="lazy">

        <div class="resumen-propiedad">
            <p class="precio"> <span>Precio:</span> $<?php echo $propiedad->precio; ?></p>
            <div>
            <ul class="iconos-caracteristicas venta">
                <li>
                    <img class="icono" src="/build/img/icono_wc.svg" alt="icono baño">
                    <p><?php echo $propiedad->wc; ?> </p>
                </li>
                <li>
                    <img class="icono" src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?> </p>
                </li>
                <li>
                    <img class="icono" src="/build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            </div>
     

           <p class="resumen-descripcion"><?php echo $propiedad->descripcion; ?></p> 
        </div>


    </main>