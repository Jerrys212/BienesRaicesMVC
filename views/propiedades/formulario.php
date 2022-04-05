<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">titulo:</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>">
    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">
    <label for="imagen">Imagen</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen) { ?>

        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small" alt="">

    <?php } ?>

    <label for="descripcion">descripcion</label>
    <textarea name="propiedad[descripcion]" id="descripcion"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion Propiedad</legend>
    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizar($propiedad->habitaciones); ?>">
    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej. 2" min="1" max="5" value="<?php echo sanitizar($propiedad->wc); ?>">
    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej. 1" min="1" max="4" value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?> value="<?php echo sanitizar($vendedor->id); ?>"> <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?></option>
        <?php } ?>
    </select>
</fieldset>