document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
});

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionResponsive);

  //muestra campos condicionales

  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );
  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostrarMetodosContacto)
  );
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  navegacion.classList.toggle("mostrar");
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `<label for="telefono">Telefono</label>
    <input type="tel" placeholder="Telefono" id="telefono" name="contacto[telefono]" required />
    
    <p>Elija la fecha y hora para ser contactado</p>

    <label for="fecha">Fecha</label>
    <input type="date" id="fecha" name="contacto[fecha]" />
    <label for="hora">Hora</label>
    <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" />`;
  } else {
    contactoDiv.innerHTML = `   <label for="email">E-Mail:</label>
    <input type="email" placeholder="E-Mail" id="email" name="contacto[email]" required />
`;
  }
}
