describe('empty spec', () => {
  it('Prueba del header pagina principal', () => {
    cy.visit('')

    cy.get('[data-cy="titulo"]').should('exist')
    cy.get('[data-cy="titulo"]').invoke('text').should('equal', 'Venta de casas y departamentos de lujo')
    cy.get('[data-cy="titulo"]').invoke('text').should('not.equal', 'Bienes raices')
  })

  it('Prueba a la seccion de iconos', () => {
    cy.get('[data-cy="iconos-nosotros"]').invoke('text').should('equal', 'Más acerca de nosotros')
    cy.get('[data-cy="iconos-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2')
    cy.get('[data-cy="iconos"]').should('exist')
    cy.get('[data-cy="iconos"]').find('.icono').should('have.length',3)
    cy.get('[data-cy="iconos"]').find('.icono').should('not.have.length',4)
  })

    it('Propiedad', () => {
      cy.get('[data-cy="anuncio"]').should('have.length', 3)
      cy.get('[data-cy="anuncio"]').should('not.have.length', 5) 

      cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block')
      cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo')
      cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver propiedad')

      cy.get('[data-cy="enlace-propiedad"]').first().click()
      cy.get('[data-cy="titulo-propiedad"]').should('exist')
      cy.wait(3000)
      cy.go('back')

    })

    it('Prueba routing todas propiedades', ()=> {
        cy.get('[data-cy="ver-propiedades"]').should('exist')
        cy.get('[data-cy="ver-propiedades"]').should('have.class', 'boton-verde')
        cy.get("[data-cy='ver-propiedades']").invoke('attr', 'href').should('equal', '/anuncios')
        cy.get("[data-cy='ver-propiedades']").click()
        cy.get("[data-cy='heading-propiedades']").invoke('text').should('equal', 'Casas y depas en venta')
        cy.wait(3000)
        cy.go('back')
    })

    it('Seccion contacto index', () => {
      cy.get("[data-cy='contacto-index']").should('exist')
      cy.get("[data-cy='contacto-index']").invoke('text').should('equal', 'Encuentra la casa de tus sueños')
      cy.get("[data-cy='parrafo-contacto-index']").should('exist')
      cy.get("[data-cy='parrafo-contacto-index']").invoke('text').should('equal', 'LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad')
      cy.get("[data-cy='boton-contacto']").should('exist')
      cy.get("[data-cy='boton-contacto']").invoke('text').should('equal', 'Contáctanos')
      cy.get("[data-cy='boton-contacto']").should('have.class', 'boton-amarillo')
      cy.get("[data-cy='boton-contacto']").invoke('attr', 'href').should('equal', '/contacto')
    })

    it('Seccion de blog', () => {
      cy.get("[data-cy='blog']").should('exist')
      cy.get("[data-cy='blog']").find('H3').invoke('text').should('equal', 'Nuestro blog')
      cy.get("[data-cy='blog']").find('PICTURE').should('have.length', 2)
      cy.get("[data-cy='testimoniales']").should('exist')

      cy.get("[data-cy='blog']").find('a').should('exist')
      cy.get("[data-cy='blog']").find('a').invoke('attr', 'href').then(href=>{
        cy.visit(href)
      })
    }) 
 
})