<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contactame</h1>

        <?php 
            if ($mensaje){
                echo "<p class='alerta exito'>".$mensaje."</p>";
            }
        ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="/build/img/destacada3.jpg" alt="imagen de contacto" loading="lazy">
        </picture>

        <h2 data-cy="heading-formulario">Llena el Formulario de Contacto</h2>
        <form data-cy="padre-formulario" class="formulario" method="POST" action="/contacto">
                <fieldset>
                    <legend>Información Personal</legend>
                    <label for="nombre">Nombre</label>
                    <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

             



                    <label for="mensaje">Mensaje</label>
                    <textarea data-cy="input-mensaje" id="mensaje" cols="30" rows="10" name="contacto[mensaje]"></textarea>
                </fieldset>

                    <fieldset>
                        <legend>Información Sobre Propiedad</legend>
                        <label for="opciones">¿Vende o compra?</label>

                        <select data-cy="input-opciones" id="opciones" name="contacto[opciones]">
                            <option value="" disabled selected>--Seleccionar--</option>
                            <option value="Compra">Compra</option>
                            <option value="Vende">Vende</option>
                            <option value="compra y vende">Comprar y Vender</option>
                        </select>

                        <label for="presupuesto">Precio o Presupuesto</label>
                        <input data-cy="input-precio" type="number" id="presupuesto" name="contacto[precio]">
                    </fieldset>

                    <fieldset>
                        <legend>Contacto</legend>
                        <p>¿Cómo prefiere ser contactad@?</p>

                            <div class="forma-contacto">
                              
                        
                                <label for="contactar-email" class="espacio">E-mail</label>
                                <input data-cy="forma-de-contacto" type="radio" value="E-mail" id="contactar-email" name="contacto[tipo-contacto]">

                                <label for="contactar-telefono" class="espacio">Teléfono</label>
                                <input data-cy="forma-de-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[tipo-contacto]">
                             </div>

                             <div id="contacto"></div>
                             
                      
                             

                    </fieldset>


                    <input type="submit" value="Enviar" class="boton-verde">

        </form>



        




    </main>