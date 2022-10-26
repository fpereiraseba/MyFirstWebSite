
<?php

//Obtener datos del html
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $identificacion = $_POST['id'];
    $email = $_POST['mail'];
    $telefono = $_POST['phone'];
    $direccion = $_POST['adress'];
    $alto = $_POST['height'];
    $largo = $_POST['long'];
    $piso = $_POST['place'];
    $info = $_POST['info'];
    
$to= 'cotizaciones@estilomallas.com';

$titulo = 'Cotización solicitada por: '.strtoupper($nombre)." ".strtoupper($apellido);

$header = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= 'from: jeanc1223@gmail.com';

//variables para los datos del archivo
	if($_FILES["img"]["error"]>0){
        echo "Error al cargar archivo o no hay archivo";
    } else {
        $permitidos= array ("image/jpeg","image/jpeg", "image/png");
        if (in_array($_FILES["img"]["type"], $permitidos)){
            $ruta = 'assets/img/'.$identificacion.'/';
            $archivo = $ruta.$_FILES["img"]["name"];
            $archivo = str_replace(' ', '', $archivo);

            if(!file_exists($ruta)){
                mkdir($ruta);
            }

            if(!file_exists($archivo)){
                $resultado = @move_uploaded_file($_FILES["img"]["tmp_name"], $archivo);

            }

        } else {
            echo "Archivo inválido";
        }
    }

$mensaje = '
<html>
    <head>
        <title>Cotización</title>
    </head>
    <body>
        <h2>Datos personales</h2>
        <table>
            <tr>
                <td><h3>Nombre:</h3></td>
                <td><p>'.$nombre.'</p></td>
            </tr>
            <tr>
                <td><h3>Apellido:</h3></td>
                <td><p>'.$apellido.'</p></td>
            </tr>
            <tr>
                <td><h3>Identificacion:</h3></td>
                <td><p>'.$identificacion.'</p></td>
            </tr>
            <tr>
                <td><h3>Email:</h3></td>
                <td><p>'.$email.'</p></td>
            </tr>
            <tr>
                <td><h3>Telefono:</h3></td>
                <td><p>'.$telefono.'</p></td>
            </tr>
            <tr>
                <td><h3>Dirección:</h3></td>
                <td><p>'.$direccion.'</p></td>
            </tr>

        
        <h2>Datos del area de trabajo</h2>
        
            <tr>
                <td><h3>Piso:</h3></td>
                <td><p>El lugar se encuentra ubicado en el piso: '.$piso.'</p></td>
            </tr>
            <tr>
                <td><h3>Altura:</h3></td>
                <td><p>'.$alto.'cm</p></td>
            </tr>
            <tr>
                <td><h3>Largo:</h3></td>
                <td><p>'.$largo.'cm</p></td>
            </tr>
            <tr>
                <td><h3>Comentarios adicionales:</h3></td>
                <td><p>'.$info.'</p></td>
            </tr>
            <tr>
                <img src="https://estilomallas.com/'.$archivo.'">
            </tr>
        </table>
    </body>
</html>

';

$mail = mail($to, $titulo, $mensaje, $header);

if (!empty($_POST['name'])){
    if($mail){
        echo "enviado";
        $validar = true;
    }else {
        echo "fallido";
    }

}


?>

