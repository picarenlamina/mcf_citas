<?php
 // Especificar correctamente el path al archivo class.phpmailer.php
require_once('PHPMailer/class.SMTP.php');
require_once('PHPMailer/class.phpmailer.php');

class Mailer extends PHPMailer
{
	public function __construct( $destinatario, $fecha, $hora  )
	{
		
		
		parent::IsSMTP(); // Usar SMTP para enviar
		$this->SMTPDebug = 1;
		// 0 =  información de depuración SMTP (para pruebas)
		// 1 = errores y mensajes
		// 2 = sólo mensajes
		$this->SMTPAuth = true; // habilitar autenticación SMTP
		$this->Host = "smtp.ionos.es"; // establece el servidor SMTP
		$this->Port = 465; // configura el puerto SMTP utilizado 25
		$this->SMTPSecure = 'ssl';
		$this->Username = "prueba@iesjoseplanes.es"; // nombre de usuario UGR
		$this->Password = "Los3Cerditos"; // contraseña del usuario UGR
		$this->Subject = "Confirmacion de cita";
		
			
		parent::SetFrom('prueba@iesjoseplanes.es', 'IES JOSE PLANES');
		parent::AddAddress($destinatario);
	
		$body = "Su cita ha sido registrada para el dia {$fecha} a la hora {$hora}";
		
		parent::MsgHTML($body); // Fija el cuerpo del mensaje

		
	}

}
 
