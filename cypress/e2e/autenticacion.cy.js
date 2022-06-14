describe('Probar la autenticacion', () => {
  it('Prueba la autenticacion en /login', () => {
    cy.visit('/login')
    cy.get("[data-cy='heading-login']").should('exist')
    cy.get("[data-cy='heading-login']").should('have.text', 'Iniciar Sesión')
    cy.get("[data-cy='formulario-login']").should('exist')

    cy.get("[data-cy='formulario-login']").submit()
  })
})