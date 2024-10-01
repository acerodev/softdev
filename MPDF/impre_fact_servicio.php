<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v = new CifrasEnLetras();
$mpdf = new \Mpdf\Mpdf();
$query = "SELECT
            servicio.servicio_id, 
            servicio.rece_id, 
            recepcion.cliente_id, 
            cliente.cliente_nombres, 
            cliente.cliente_direccion,
            cliente.cliente_dni,  
            cliente.cliente_celular, 
            recepcion.rece_equipo, 
            recepcion.rece_caracteristicas, 
            recepcion.motivo_id, 
            recepcion.rece_concepto, 
            motivo.motivo_descripcion, 
            CONCAT( motivo.motivo_descripcion, ' ( ', servicio.servicio_concepto, ')') as servi, 
            servicio.servicio_monto, 
            servicio.servicio_concepto, 
            servicio.servicio_responsable, 
            servicio.servicio_comentario, 
            servicio.servicio_fregistro, 
            servicio.servicio_entrega, 
            servicio.servicio_obser, 
            servicio.servicio_modelo, 
            servicio.fpago_id, 
            forma_pago.fpago_descripcion,
            configuracion.confi_id, 
            configuracion.confi_tipo_igv, 
            configuracion.confi_igv, 
            configuracion.confi_moneda1, 
            configuracion.confi_moneda2,
            configuracion.confi_nombre_sistema,
                configuracion.confi_razon_social, 
                configuracion.confi_ruc, 
                configuracion.confi_nombre_representante, 
                configuracion.confi_direccion, 
                configuracion.confi_celular, 
                configuracion.confi_telefono, 
                configuracion.confi_correo, 
                configuracion.config_foto, 
                configuracion.confi_url,
                configuracion.confi_moneda,
                (SELECT IFNULL(SUM(rei.monto_ri),0) as tott FROM recep_insumos rei where rei.rece_id = '" . $_GET['codigo'] . "') as total_rece_insumo,
                (SELECT SUM(re.monto) FROM recep_equipo re  where re.rece_id = '" . $_GET['codigo'] . "') as total_rece_equi,
                (SELECT IFNULL(SUM(re2.abono),0) FROM recep_equipo re2  where re2.rece_id = '" . $_GET['codigo'] . "') as total_rece_abono,
            (SELECT COUNT(*)  FROM recep_insumos r2 where r2.rece_id = '" . $_GET['codigo'] . "') as contador_insumo
            FROM
            servicio
            INNER JOIN
            recepcion
            ON 
                servicio.rece_id = recepcion.rece_id
            INNER JOIN
            cliente
            ON 
                recepcion.cliente_id = cliente.cliente_id
            INNER JOIN
            motivo
            ON 
                recepcion.motivo_id = motivo.motivo_id
            INNER JOIN
            forma_pago
            ON 
                servicio.fpago_id = forma_pago.fpago_id,
                configuracion
                where servicio.rece_id = '" . $_GET['codigo'] . "'";

$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {
	$pendiente =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']  - $row1['total_rece_abono'] , 2, '.', '')) ;
  $totalpagar =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']   , 2, '.', '')) ;
  $solesmoned = ($row1['confi_moneda1']);
	$centimosmoned = ($row1['confi_moneda2']);
	//Convertimos el total en letras
	$letra=$v->convertirEurosEnLetras($totalpagar, $solesmoned, $centimosmoned);
	//$letra = ($v->convertirEurosEnLetras($totalpagar));


	$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
    <table style="border-collapse; " border="1" >
	    <thead >
	    	<tr>

	    		<th width="20%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; "><img src="../' . $row1['config_foto'] . '" width="70px"></th>

	    		<th width="50%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
	    			<h3><b>' . $row1['confi_razon_social'] . '</b></h3><br>
	    			<b>Direcci&oacute;n: </b>' . $row1['confi_direccion'] . '<br>
	    			<b>Tel: </b>' . $row1['confi_telefono'] . ' -  <b>Movil: </b>' . $row1['confi_celular'] . '<br>
	    		
	    			<b>Correo: </b>' . $row1['confi_correo'] . '<br>
	    		</th>

	    		<th width="30%" style="text-align:center;">
	    			<h3 style="">R.U.C  ' . $row1['confi_ruc'] . ' </h3><br>
	    			<h2 style="color:black;">BOLETA DE VENTA    </h2><br>
	    			<h3 style="">B001 - 000'. $row1['servicio_id'].' </h3>
	    		</th>
	    	</tr>
	    </thead>
    </table>
     

    </header>
 	<table  style="border-collapse; " border="1" class="round_table" >
	    <thead >
	    	<tr>
	    
	    		<th width="50%" style="  text-align:left; border-right:0px; ">
	    			<b>Cliente   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>' . $row1['cliente_nombres'] . '<br>
	    			<br><b>Doc. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </b>' . $row1['cliente_dni'] . '<br>
	    			<br><b>Direcci&oacute;n &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>' . $row1['cliente_direccion'] . '<br>
	    			<br><b>M&oacute;vil   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>' . $row1['cliente_celular'] . '<br>
					<br><b>Observaci&oacute;n : </b><br>
	    			
	    		</th>
	    		<th width="50%" style="text-align:right; border-left:0px;">
	    			<b>Fecha: </b>' . $row1['servicio_fregistro'] . '<br><br>
	    			<br><br>
	    			<br><br>
	    			<br><br>
	    			
	    		</th>

	    	</tr>
	    </thead>
    </table>
    
    <main>
      <table  style="border-collapse; " border="1" >
        <thead>
          <tr>
            <th class="service"  >ITEM</th>
            <th class="desc">DESCRIPCION</th>
            <th>CANTIDAD</th>
            <th>SUB TOTAL</th>

          </tr>
        </thead>
        <tbody>';
	$query2 = "SELECT re.rece_id,
                    re.equipo ,
                    '1' as cantid,
                    re.monto
                    FROM recep_equipo re
                    where re.rece_id = '" . $row1['rece_id'] . "'";
	$contador = 0;
	$resultado2 = $mysqli->query($query2);
  $query3 = "SELECT
                ri.producto_id,
                CONCAT(p.producto_nombre) as nombre_pro,
                ri.cantidad,
                ri.monto_ri
              FROM
                recep_insumos ri INNER JOIN producto p ON ri.producto_id = p.producto_id
              WHERE
                ri.rece_id = '" . $row1['rece_id'] . "'";
	
	$resultado3 = $mysqli->query($query3);
  
  if($row1['contador_insumo'] > 0) {
      
 

	while ($row2 = $resultado2->fetch_assoc()) {
		$contador++;

   

		$html .= '<tr >
            <td class="service" style="border-bottom:0px; border-top:0px;">' . $contador . '</td>
            <td class="desc" style="border-bottom:0px ;border-top:0px;">'.$row1['motivo_descripcion'] .' - ' . $row2['equipo'] . '</td>  
            <td class="desc" style="border-bottom:0px ;border-top:0px;">' . $row2['cantid'] . '</td>  
            <td class="total" style="border-bottom:0px; border-top:0px;"> '.$row1['confi_moneda'].' '.number_format ((float)$row2['monto']  , 2, '.', '').'   </td>
            </tr>';
        }

      	while ($row3 = $resultado3->fetch_assoc()) {
          $contador++;
      
          $html .= '<tr >
                  <td class="service" style=" border-top:0px; ">' . $contador . '</td>
                  <td class="desc" style="border-top:0px; ">'.$row3['nombre_pro'] .'</td>  
                  <td class="desc" style="border-top:0px; ">'.$row3['cantidad'] .'</td>  
                  <td class="total" style=" border-top:0px;  "> '.$row1['confi_moneda'].' '.number_format ((float)$row3['monto_ri']  , 2, '.', '').'</td>
                  </tr>';
              }

             

            } else {

              while ($row2 = $resultado2->fetch_assoc()) {
                $contador++;
            
               
            
                $html .= '<tr >
                        <td class="service" style="border-top:0px;">' . $contador . '</td>
                        <td class="desc" style="border-top:0px;">'.$row1['motivo_descripcion'] .' - ' . $row2['equipo'] . '</td>  
                        <td class="desc" style="border-top:0px;">' . $row2['cantid'] . '</td>  
                        <td class="total" style=" border-top:0px;"> '.$row1['confi_moneda'].' '.number_format ((float)$row2['monto']  , 2, '.', '').'   </td>
                        </tr>';
                    }

            } 
            $html .= '
          
           


            <tr >
            <td class="total" style=" border-left:0px; border-bottom:0px; border-top:0px; border-right:0px;"></td>
            <td class="total" style=" border-left:0px; border-bottom:0px; border-top:0px; border-right:0px;"></td>
            <td class="total" style=" border-left:0px; border-bottom:0px; border-top:0px; border-right:0px;">Total:</td>
            <td class="total" style="text-align: right; font-size: 11px; "> '.$row1['confi_moneda'].' '.$totalpagar.'</td>

            </tr>
           
        </tbody>
      </table>
      <div id="notices">
        <div>SON:</div>
        <div class="notice">' . strtoupper($letra) . '</div>
		<br>
		<br>
		<div><b>Condiciones:</b></div><br>
        <div>Forma de Pago &nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; ' . $row1['fpago_descripcion'] . '</div>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>';
}
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();