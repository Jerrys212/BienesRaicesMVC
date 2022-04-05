<fieldset>

    <legend>Informacion General</legend>
    <label for="nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor" value="<?php echo sanitizar($vendedor->nombre); ?>">
    <label for="nombre">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido Vendedor" value="<?php echo sanitizar($vendedor->apellido); ?>">
    <label for="nombre">Telefono:</label>
    <input type="text" name="vendedor[telefono]" id="telefono" placeholder="Telefono Vendedor" value="<?php echo sanitizar($vendedor->telefono); ?>">
</fieldset>