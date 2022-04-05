//<references types = "cypress"/>

describe("Carga la pagina principal", () => {
  it("prueba el header de la pag principal", () => {
    cy.visit("/");

    cy.get('[data-cy="heading-sitio"]').should("exist");
    cy.get('[data-cy="heading-sitio"]')
      .invoke("text")
      .should("equal", "Venta de Casas y Departamentos Exclusivos de lujo");
    cy.get('[data-cy="heading-sitio"]')
      .invoke("text")
      .should("not.equal", "Bienes Raices");
  });

  it("prueba el header de los iconos principales", () => {});
});
