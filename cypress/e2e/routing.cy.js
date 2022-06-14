describe('Prueba la navegacion del header y el footer', () => {
  it('Prueba la navegacion del header', () => {
    cy.visit('')
    cy.get("[data-cy='navegacion-header']").should('exist')
    cy.get("[data-cy='navegacion-header']").find('a').should('have.length', 6)
    cy.get("[data-cy='navegacion-header']").find('a').should('not.have.length', 10)
    cy.get("[data-cy='navegacion-header']").find('a').eq(1).invoke('attr', 'href').should('equal', '/nosotros')
    cy.get("[data-cy='navegacion-header']").find('a').eq(1).invoke('text').should('equal', 'Nosotros')
    cy.get("[data-cy='navegacion-header']").find('a').eq(2).invoke('attr', 'href').should('equal', '/anuncios')
    cy.get("[data-cy='navegacion-header']").find('a').eq(2).invoke('text').should('equal', 'Anuncios')
    cy.get("[data-cy='navegacion-header']").find('a').eq(3).invoke('attr', 'href').should('equal', '/blog')
    cy.get("[data-cy='navegacion-header']").find('a').eq(3).invoke('text').should('equal', 'Blog')
    cy.get("[data-cy='navegacion-header']").find('a').eq(4).invoke('attr', 'href').should('equal', '/contacto')
    cy.get("[data-cy='navegacion-header']").find('a').eq(4).invoke('text').should('equal', 'Contacto')
    cy.get("[data-cy='navegacion-header']").find('a').eq(5).invoke('attr', 'href').should('equal', '/login')
    cy.get("[data-cy='navegacion-header']").find('a').eq(5).invoke('text').should('equal', 'Login')
  })

  it('Prueba la navegacion del footer', () => {
    cy.visit('')
    cy.get("[data-cy='navegacion-footer']").should('exist')
    cy.get("[data-cy='navegacion-footer']").find('a').should('have.length', 4)
    cy.get("[data-cy='navegacion-footer']").find('a').should('not.have.length', 10)
    cy.get("[data-cy='navegacion-footer']").find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(0).invoke('text').should('equal', 'Nosotros')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(1).invoke('attr', 'href').should('equal', '/anuncios')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(1).invoke('text').should('equal', 'Anuncios')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(2).invoke('attr', 'href').should('equal', '/blog')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(2).invoke('text').should('equal', 'Blog')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(3).invoke('attr', 'href').should('equal', '/contacto')
    cy.get("[data-cy='navegacion-footer']").find('a').eq(3).invoke('text').should('equal', 'Contacto')
  })
})