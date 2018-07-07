<?php
//Requerimos el autoload
    require '../vendor/autoload.php';
    //Llamamos al DOMpdf -> libreria para 
    use Dompdf\Dompdf;
    //Aqui se llena la informacion a mostrar en el certificado
    $datos = array("nombre" => "David Arteaga","curso" => "Laravel","instructor" => "Jose Cuicas");
    //Instanciamos a la libreria de pdf's
    $dompdf = new Dompdf();
    ob_start(); //Esta funcion lo que hace es que guarda el include a y lo pone en la cache.
    //Convertimos en variable cada valor de los datos
    extract($datos);
    //Inclumos el certificado
    include '../templates/pdf/certificado.php';
    //Vaciamos la informacion de ob en una variable
    $html = ob_get_clean();
    //Aqui se le asigna el html
    $dompdf->loadHtml($html);
    //Se renderiza el archivo html
    $dompdf->render();
    //Se renderiza stream
    $dompdf->stream("certificado.pdf");
