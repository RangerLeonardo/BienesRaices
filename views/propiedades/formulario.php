<fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo/Propiedad" value="<?php echo s( $propiedad->titulo); ?>">
            
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" min="1" value="<?php echo s($propiedad->precio); ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/*" name="propiedad[imagen]">

            <?php if($propiedad->imagen): ?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-formulario" alt="Imagen previa">
                <?php endif;?>

           
            <label for="descripcion" >Descripción:</label>
            <!-- el atributo name permite a un script acceder al contenido del input o textarea-->
             <!-- el textarea no tiene value, el "value" se pone dentro del textarea -->
            <textarea id="descripcion" name="propiedad[descripcion]" cols="30" rows="10"><?php echo s($propiedad->descripcion); ?></textarea>



        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">habitaciones:</label>
            <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Num. habitaciones" min="1" value="<?php echo s($propiedad->habitaciones); ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Num. baños" name="propiedad[wc]" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Estacionamiento" min="1" value="<?php echo s($propiedad->estacionamiento); ?>">
            
        </fieldset>

        <fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor:</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected value="">-- Seleccionar --</option>
        <?php foreach($vendedores as $vendedor){ ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> 
        <?php  } ?>
    </select>
        </fieldset>

   