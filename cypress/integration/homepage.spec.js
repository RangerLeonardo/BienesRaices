/// <reference types="cypress" />

describe("Carga la pagina principal", () => {
   it("Prueba el header de la pagina principal",() => {
        cy.visit("/");

        // generio, mala practica cy.get("h1")

        //assertion algo que se cumple o no, como un if
        cy.get("[data-cy='heading-sitio']").should("exist")
        //invoke es una forma de leer el texto
        cy.get("[data-cy='heading-sitio']").invoke("text").should("equal","Venta de Casas y Departamentos Exclusivos de Lujo");

        cy.get("[data-cy='heading-sitio']").invoke("text").should("not.equal","Bienes raices");
    });
     
    it("Prueba el heading de Mas Sobre Nosotros",() =>{

        cy.get("[data-cy='mas-Nosotros']").should("exist")

        cy.get("[data-cy='mas-Nosotros']").should("have.prop","tagName").should("equal","H2");


        //revisamos que sí tenga el texto correcto
        cy.get("[data-cy='mas-Nosotros']").invoke("text").should("equal","Más Sobre Nosotros");
        //revisamos que no tenga otro texto
        cy.get("[data-cy='mas-Nosotros']").invoke("text").should("not.equal","Bienes raices");

        //selecciona los iconos
        cy.get("[data-cy='iconos-nosotros']").should("exist");
        //con find podemos seleccionar elementos que se encuentran dentro del div padre
        cy.get("[data-cy='iconos-nosotros']").find(".icono").should("have.length", 3);
        cy.get("[data-cy='iconos-nosotros']").find(".icono").should("not.have.length", 4);

    });


    it("Prueba propiedades de la página principal",() =>{

        //comprobando titulo
        cy.get("[data-cy='principal-Propiedades']").should("exist")
        cy.get("[data-cy='principal-Propiedades']").should("have.prop","tagName").should("equal","H2");
        cy.get("[data-cy='principal-Propiedades']").invoke("text").should("equal","Casas y Departamentos en Venta");

        //comprobando que haya 3 propiedades
        cy.get("[data-cy='contenedor-Propiedades']").should("exist");
        cy.get("[data-cy='contenedor-Propiedades']").find(".anuncio").should("have.length", 3);
        cy.get("[data-cy='contenedor-Propiedades']").find(".anuncio").should("not.have.length", 4);


        //probando el enlace de la propiedad
        cy.get("[data-cy='enlace-Propiedad']").should("have.class","boton-amarillo-block")
        cy.get("[data-cy='enlace-Propiedad']").first().invoke("text").should("equal","Ver Propiedad");

        //probando el enlace a una propiedad
        cy.get("[data-cy='enlace-Propiedad']").first().click();
        cy.get("[data-cy='titulo-Propiedad']").should("exist");

        //espera un segundo 
        cy.wait(1000);
        //regresa una página atrás
        cy.go("back");
    });

    it("Prueba el routing hacia todas las propiedades", () =>{
        cy.get("[data-cy='ver-Propiedades']").should("exist");
        cy.get("[data-cy='ver-Propiedades']").should("have.class","boton-verde");
        cy.get("[data-cy='ver-Propiedades']").invoke("attr","href").should("equal", "/propiedades");
        cy.get("[data-cy='ver-Propiedades']").click();

        cy.get("[data-cy='heading-Propiedades']").invoke("text").should("equal","Casas y Departamentos en venta")

        cy.wait(1000);
        cy.go("back");
    });

    it("Bloque de Contacto",()=>{
        cy.get("[data-cy='imagen-contacto']").should("exist");
        cy.get("[data-cy='imagen-contacto']").find("h2").invoke("text").should("equal","Encuentra la casa de tus sueños");
        cy.get("[data-cy='imagen-contacto']").find("p").invoke("text").should("equal","Llena el formulario de contacto y un asesor se pondrá en contacto contigo")

        cy.get("[data-cy='imagen-contacto']").find("a").invoke("attr","href")
            .then(href=>{
                cy.visit(href)
            });
        
        cy.get("[data-cy='heading-contacto']").should("exist");
        cy.wait(1000)
        cy.visit("/");






    });



    it("Testimoniales y Blog",()=>{

        cy.get("[data-cy='blog']").should("exist");
        cy.get("[data-cy='blog']").find("h2").invoke("text").should("equal","Nuestro Blog")
        cy.get("[data-cy='blog']").find("img").should("have.length", 2);




        cy.get("[data-cy='testimoniales']").should("exist");
        cy.get("[data-cy='testimoniales']").find("h2").invoke("text").should("equal","Testimoniales")




    });



});


