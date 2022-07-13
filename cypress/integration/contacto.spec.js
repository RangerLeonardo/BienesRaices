/// <reference types="cypress" />

describe("Testea todo el formulario de la pagina contacto",()=>{

    it("Prueba la página de contacto y el envio de emails",()=>{
         cy.visit("/contacto");
        
         cy.get("[data-cy='heading-contacto']").should("exist")

         cy.get("[data-cy='heading-contacto']").invoke("text").should("equal","Contactame");

        
         cy.get("[data-cy='heading-formulario']").should("exist")

         cy.get("[data-cy='heading-formulario']").invoke("text").should("equal","Llena el Formulario de Contacto");

         cy.get("[data-cy='padre-formulario']").should("exist");


        
    });

    it("LLenando los campos del formulario",()=>{
        cy.wait(1000);
        //type=tipea, escribe y así 
        cy.get("[data-cy='input-nombre']").type("Leonardo");
        cy.get("[data-cy='input-mensaje']").type("Hola, deseo comprar una casa en esta página, bien ubicada en el centro de Toluca");

        cy.get("[data-cy='input-opciones']").select("Compra");

        cy.get("[data-cy='input-precio']").type("250000");

        cy.get("[data-cy='forma-de-contacto']").eq(0).check();
        cy.get("[data-cy='input-correo']").type("correo@correo.com");


        cy.wait(1500);

        cy.get("[data-cy='forma-de-contacto']").eq(1).check();
        cy.get("[data-cy='input-telefono']").type("4411223300");
        cy.get("[data-cy='input-fecha']").type("2022-05-24");
        cy.get("[data-cy='input-hora']").type("12:00");


        cy.get("[data-cy='padre-formulario']").submit();










    });





});