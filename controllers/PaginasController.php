<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $propiedades=Propiedad::limite(3);
        $inicio=true;

        $router->render("paginas/index",[
            "propiedades"=>$propiedades,
            "inicio"=>$inicio
        ]);
    }

    /*------------------------------------------*/
    public static function nosotros(Router $router){
        $router->render("paginas/nosotros",[]);
    }
    /*------------------------------------------*/



    public static function propiedades(Router $router){
        $propiedades=Propiedad::limite(9);
        
        $router->render("paginas/propiedades",[
            "propiedades"=>$propiedades

        ]);

    }
    /*------------------------------------------*/


    public static function propiedad(Router $router){
       
        //validando id
        $id=validarORedireccionar("/propiedades");
        $propiedad=Propiedad::find($id);


        $router->render("paginas/propiedad",[
            "propiedad"=>$propiedad

        ]);

    }
    /*------------------------------------------*/


    public static function blog(Router $router){
        
        $router->render("paginas/blog",[]);


    }
    /*------------------------------------------*/


    public static function entrada(Router $router){

        $router->render("paginas/entrada",[]);
    }
    /*------------------------------------------*/

    public static function contacto(Router $router){
        
        $mensaje=null;

    
        if($_SERVER["REQUEST_METHOD"]==="POST"){

            //validar
            $respuestas = $_POST['contacto'];

                     //crear una instancia de PHPMailer
                     $mail=new PHPMailer();

                     //configurar el SMTP (protocolo)
                     $mail->isSMTP();
                     $mail->Host="smtp.mailtrap.io";
                     $mail->SMTPAuth=true;
                     $mail->Username="ba5cee70e97a01";
                     $mail->Password="bd9d10d20e4bc3";
                     $mail->SMTPSecure="tls";
                     $mail->Port=2525;
         
                     //Configurar el contenido del mail
         
                     //quien envia el email
                     $mail->setFrom("admin@bienesraices.com");
                     //a que direccion va a llegar el email
                     $mail->addAddress("admin@bienesraices.com","BienesRaices.com");
                     $mail->Subject="Tienes un nuevo mensaje de Bienes Raices";
         
                     //Habilitar HTML
                     $mail->isHTML(true);
                     $mail->CharSet="UTF-8";
         
                     //Definir el contenido
                     $contenido="<html>";
                     $contenido.="<p>Tienes un nuevo mensaje</p>";
                     $contenido.="<p>Nombre: ".$respuestas["nombre"]."</p>";
                     $contenido.="<p>Mensaje: ".$respuestas["mensaje"]."</p>";
                     $contenido.="<p>Compra o vende: ".$respuestas["opciones"]."</p>";
                     $contenido.="<p>Precio: $".$respuestas["precio"]."</p>";

                        //enviar de forma condicional el email o telefono
                        if($respuestas ["tipo-contacto"] === "telefono"){
                            //telefono
                            $contenido.="<p>Eligió ser contactado por telefono</p>";
                            $contenido.="<p>Telefono: ".$respuestas["telefono"]."</p>";
                            $contenido.="<p>Fecha: ".$respuestas["fecha"]."</p>";
                            $contenido.="<p>Hora: ".$respuestas["hora"]."</p>";
                        }
                        else{
                            //es el email
                            $contenido.="<p>Eligió ser contactado por correo</p>";
                            $contenido.="<p>Email: ".$respuestas["correo"]."</p>";

                        }



                     $contenido.="<p>Forma preferente de ser contactado: ".$respuestas["tipo-contacto"]."</p>";




                     $contenido.="</html>";


                     $mail->Body=$contenido;
                     $mail->AltBody="Esto es texto alternativo sin html";
         
         
                     //Enviar el email
                     //nos retorna 2 valores, true=si se envio false=no se envio
                     if($mail->send()){
                        $mensaje="Mensaje enviado correctamente";
                     }
                     else{
                         $mensaje="El mensaje no se pudo enviar";
                     }
         

        }

        $router->render("paginas/contacto",[

            "mensaje"=>$mensaje

        ]);
    }


}