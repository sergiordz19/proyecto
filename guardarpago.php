<?php
 //conectamos Con el servidor
 $host ="localhost";
 $user ="root";
 $pass ="";
 $db="registro";

 //funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");


 //recuperar las variables
 $nombre=$_POST['nombre'];
 $correo=$_POST['correo'];
 $telefono=$_POST['telefono'];
 $edad=$_POST['edad'];
 $tipo=$_POST['tipo'];
 $numtarje=$_POST['numtarje'];
 $fechaven=$_POST['fechaven'];
 $codigo=$_POST['codigo'];
 $destino=$_POST['destino'];
 $asientos=$_POST['asientos'];
 //hacemos la sentencia de sql
 $sql="INSERT INTO reservar VALUES('$nombre','$correo','$telefono','$edad','$tipo','$numtarje','$fechaven','$codigo','$destino','$asientos')";
 //ejecutamos la sentencia de sql
 $ejecutar=mysqli_query($con,$sql);
 require 'PDF/fpdf/fpdf.php';
 $pdf = new FPDF();
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',15);
 $pdf->SetX(50);
 $pdf->MultiCell(100,10,"Aerolinea S&B" . "\n\n" .
 				"Su reservacion ha sido un exito, a continuacion se muestran todos los datos." . "\n\n" .
				"Origen: Torreon, Mexico." . "\n" .
				"Destino: " . $_POST['destino'] ."\n" .
				"Asientos reservados: " . $_POST['asientos'] . "\n\n" .
 				"Nombre: " . $_POST['nombre'] . "\n" .
 				"Correo: " . $_POST['correo'] . "\n" .
				"Telefono: " . $_POST['telefono'] . "\n" .
				"Edad: " . $_POST['edad'] . "\n\n" .
 				"Su metodo de pago es: " . $_POST['tipo'] . "\n" . 
 				"Su numero de tarjeta es: " .$_POST['numtarje'] . "\n" .
				"Fecha de vencimiento: " .$_POST['fechaven'] . "\n" .
 				"Su codigo de seguridad es: " .$_POST['codigo'] ,1,'C',0);
 
 $pdf->Output();
 //verificamos la ejecucion
// if(!$ejecutar){
 // echo"Hubo Algun Error";
 //}else{
  //echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
 //}
 
 
?>