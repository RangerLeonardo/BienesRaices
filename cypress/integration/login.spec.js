/// <reference types="cypress" />

describe("Testeando la autenticación",() =>{
    it("Probando la autenticación en login",() =>{
        cy.visit("/login");
        
        cy.get("[data-cy='heading-login']").should("exist");
        cy.get("[data-cy='heading-login']").should("have.text","Iniciar Sesión");

        cy.get("[data-cy='formulario-login']").should("exist");

        //Ambos campos son obligatorios
        cy.get("[data-cy='formulario-login']").submit();
        cy.get("[data-cy='alerta-login']").should("exist");
        cy.get("[data-cy='alerta-login']").eq(0).should("have.class","alerta").and("have.class","error");
        cy.get("[data-cy='alerta-login']").eq(0).should("have.text","El Correo es Obligatorio");

        cy.get("[data-cy='alerta-login']").eq(1).should("have.class","alerta").and("have.class","error");
        cy.get("[data-cy='alerta-login']").eq(1).should("have.text","La Contraseña es Obligatoria");



        
        //el usario exista


        //verificar el password


    });





});