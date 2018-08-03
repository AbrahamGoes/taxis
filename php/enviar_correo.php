<?php
$response = array();

$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];

if ($nombre=='' OR $correo=='' ) {
	 $response['error'] = '<div style="color:red" class="mr-2">* Ingresa los campos necesarios.</div>';
}else{


$subject = 'Solicitud de información';
			
$headers = "From: ".$nombre."<".$correo.">\r\n";
$headers .= "Reply-To: \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

$message = '<html><body>';
$message .= '<table align="center" style="font-size:14px;width:100%;max-width: 600px;" border="0">';
$message .= '<tr><td style="text-align:center"><img src="http://joylab.com.mx/taxis/img/RTE_17_Logo_100x100px-0.png"></td></tr>';
$message .= '<tr><td style="padding-left:5%;"><br><b>Datos de contacto: </b></td></tr>';
$message .= '<tr><td style="padding-left:5%;text-align:justify;"></td></tr>';
$message .= '<tr><td style="padding-left:5%;">
			<br><br>
			<b>Nombre:</b> '.$nombre.'<br>
			<b>Teléfono:</b> '.$telefono.'<br>
			<b>Correo:</b> '.$correo.'<br>
			<b>Mensaje:</b> '.$mensaje.'<br>
			<br><br>
			Ponte en contacto con el cliente.
             </td></tr>';
$message .= '<tr><td style="background:#72CCDB">
<br>
</td></tr>';
			$message .= "
					</table>
</body></html>";
			
mail('abraham@conexus.us', $subject, $message, $headers);




$to = $correo;


$subject = 'Radio Taxi E.T.P., Gracias por ponerte en contacto con nosotros';
			
$headers = "From: contacto Radio Taxi E.T.P.<info@rtesitio338.com>\r\n";
$headers .= "Reply-To: \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

$message = '<html><body>';
$message .= '<table align="center" style="font-size:14px;width:100%;max-width: 600px;" border="0">';
$message .= '<tr><td style="text-align:center"><img src="http://joylab.com.mx/taxis/img/RTE_17_Logo_100x100px-0.png"></td></tr>';
$message .= '<tr><td style="padding-left:5%;"><br><b>GRACIAS POR PONERTE EN CONTACTO CON NOSOTROS EN UN MOMENTO UNO DE NUESTROS ASESORES SE COMUNICARA CON USTED. </b></td></tr>';
$message .= '<tr><td style="padding-left:5%;text-align:justify;"></td></tr>';
$message .= '<tr><td style="padding-left:5%;">
			<br><br>
			<b>SALUDOS.</b>
             </td></tr>';
$message .= '<tr><td style="background:#72CCDB">
<br>
</td></tr>';
			$message .= "
					</table>
</body></html>";
			
mail($to, $subject, $message, $headers);
$response['success'] =  'exitoguardadoahora';
}

echo json_encode($response);

?>