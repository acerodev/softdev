<?php

require '../../model/modelo_cliente.php';
$MCL = new Modelo_Cliente(); //instaciamops
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
$dni = htmlspecialchars($_POST['dni'], ENT_QUOTES, 'UTF-8');
$cel = htmlspecialchars($_POST['cel'], ENT_QUOTES, 'UTF-8');
$estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8');
$apellidop = htmlspecialchars($_POST['apellidop'], ENT_QUOTES, 'UTF-8');
$apellidom = htmlspecialchars($_POST['apellidom'], ENT_QUOTES, 'UTF-8');
$correo = htmlspecialchars($_POST['correo'], ENT_QUOTES, 'UTF-8');
$tipo_doc = htmlspecialchars($_POST['tipo_doc'], ENT_QUOTES, 'UTF-8');


$consulta = $MCL->Modificar_Cliente($id, $nombre, $dni, $cel, $estado, $direccion, $apellidop, $apellidom, $correo, $tipo_doc); //llamamos al metodo del modelo
echo $consulta;