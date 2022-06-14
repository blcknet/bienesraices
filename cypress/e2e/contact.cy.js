/// <reference types="cypress"/>

describe('Prueba la pagina de contacto y envio de emails', () => {
  it('passes', () => {
    cy.visit('/contacto')
    cy.get("[data-cy='heading-contacto']").should('exist')
    cy.get("[data-cy='heading-contacto']").invoke('text').should('equal', 'Contacto')

    cy.get("[data-cy='heading-formulario']").should('exist')
    cy.get("[data-cy='heading-formulario']").invoke('text').should('equal', 'Llena el formulario')
  })

  it('Probando el formulario', () => {
    cy.get("[data-cy='input-nombre']").should('exist')
    cy.get("[data-cy='input-nombre']").type('Luis olvera')
    
    cy.get("[data-cy='input-mensaje']").type('Deseo comprar una casa')
    cy.get("[data-cy='input-opciones']").select('compra')

    cy.get("[data-cy='input-precio']").type(999999)

    cy.get("[data-cy='forma-contacto']").eq(0).check()

    cy.wait(3000)

    cy.get("[data-cy='forma-contacto']").eq(1).check()


  })
})