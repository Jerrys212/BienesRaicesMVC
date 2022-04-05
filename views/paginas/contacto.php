<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php

    if ($mensaje) { ?>
        <p class="alerta exito"> <?php echo $mensaje; ?> </p>
    <?php } ?>


    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
        <img src="build/img/destacada3.jpg" loading="lazy" alt="Imagen Contacto" />
    </picture>

    <h2>Llene el formulario de Contacto</h2>
    <form action="/contacto" method="POST" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" required />

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o compra:</label>
            <select required name="contacto[tipo]" id="opciones">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Presupuesto</label>
            <input required type="number" placeholder="Precio o Presupuesto" id="presupuesto" name="contacto[precio]" />
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input required type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" />
                <label for="contactar-email">E-Mail</label>
                <input required type="radio" value="email" id="contactar-email" name="contacto[contacto]" />
            </div>

            <div id="contacto">

            </div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde" />
    </form>
</main>