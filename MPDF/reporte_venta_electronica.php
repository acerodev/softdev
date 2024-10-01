<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v = new CifrasEnLetras();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 225]]);
$query = "SELECT
	venta.venta_id, 
	venta.venta_comprobante, 
	venta.venta_serie, 
	venta.venta_num_comprobante, 
	DATE_FORMAT(venta.venta_fregistro, '%d/%m/%Y') as venta_fregistro,
	venta.venta_hora,
	venta.venta_total,
	venta.venta_impuesto, 
	venta.venta_porcentaje,
	venta.cliente_id, 
	venta.compro_id, 
	cliente.cliente_nombres, 
	cliente.cliente_dni, 
	cliente.cliente_direccion, 
	cliente.cliente_celular, 
	configuracion.confi_id, 
	fp.fpago_descripcion,
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
	configuracion.confi_tipo_igv, 
	configuracion.confi_igv, 
	configuracion.confi_moneda1, 
	configuracion.confi_moneda2,
	configuracion.confi_nombre_sistema,
	venta.venta_descuento
	FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
		INNER JOIN forma_pago fp on 
		venta.fpago_id = fp.fpago_id,
	configuracion

	where venta.venta_id = '" . $_GET['codigo'] . "'";

//REEMPLAZAR COMA POR PUNTO DEPENDE LA BASE (convertirNumeroEnLetras)
$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {

	$totalpagar = ($row1['venta_total']);
	//Convertimos el total en letras
	$solesmoned = ($row1['confi_moneda1']);
	$centimosmoned = ($row1['confi_moneda2']);
	//Convertimos el total en letras
	$letra=$v->convertirEurosEnLetras($totalpagar, $solesmoned, $centimosmoned);

	$html .= '
	<style>
@page {
	margin: 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	odd-footer-name: html_myfooter1;
	}
</style>
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../' . $row1['config_foto'] . '" width="45px"></h3><br>
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">' . $row1['confi_razon_social'] . '</h3>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">' . $row1['confi_direccion'] . '</h5>	
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">RUC ' . $row1['confi_ruc'] . '</h5>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Movil. ' . $row1['confi_celular'] . '</h5>
	-------------------------------------------------------------------<br>

	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;" ><b>' . $row1['venta_comprobante'] . ' DE VENTA </b></h5>
	<h4 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;">' . $row1['venta_serie'] . '-' . $row1['venta_num_comprobante'] . '</h4>
	-------------------------------------------------------------------<br>
	Fecha:&nbsp;' . $row1['venta_fregistro'] . '&nbsp;&nbsp; - &nbsp;&nbsp;' . $row1['venta_hora'] . ' <br>
	Cliente:&nbsp; ' . $row1['cliente_nombres'] . '<br>
	N. Doc.:&nbsp; ' . $row1['cliente_dni'] . '<br>
	Direcci&oacute;n:&nbsp; ' . $row1['cliente_direccion'] . '<br>
	F. Pago:&nbsp; ' . $row1['fpago_descripcion'] . '<br><br>';
	
	$html .= '

	<table>
	     <thead>

             <tr>
            
            </tr>
	     </thead>
	  </table>
         
         ';

	$html .= ' -------------------------------------------------------------------
	<table >
        <thead>

          <tr>  
            <th>#</th>
            <th >DESCRIPCION</th>
            <th>CANT.</th>
			<th>DESC.</th>
            <th>IMPORTE </th>
          </tr>

           <tr>
            <td colspan="5" style="text-align:right;font-size:12px">------------------------------------------------------------------------------</td>
          </tr>
   
        </thead>

        <tbody>';
	$query2 = "SELECT
					detalle_venta.vdetalle_id, 
					detalle_venta.producto_id, 
					CASE
						WHEN producto.pro_imei = 'si' THEN CONCAT(producto.producto_nombre, ' - IMEI (', detalle_venta.v_imei,  ')')
						ELSE producto.producto_nombre
					END AS producto_nombre, 
					detalle_venta.vdetalle_cantidad, 
					detalle_venta.vdetalle_precio,
					(detalle_venta.vdetalle_cantidad * detalle_venta.vdetalle_precio -  detalle_venta.vdetalle_descuento ) as subtotal,
					detalle_venta.vdetalle_descuento
				FROM
					detalle_venta
					INNER JOIN
					producto
					ON 
						detalle_venta.producto_id = producto.producto_id
						where detalle_venta.venta_id = '" . $row1['venta_id'] . "'";
	$contador = 0;
	$resultado2 = $mysqli->query($query2);
	while ($row2 = $resultado2->fetch_assoc()) {
		$contador++;

		$html .= '
        <tr>
            <td>' . $contador . '</td>
            <td>' . $row2['producto_nombre'] . ' - ' . $row1['confi_moneda'] . ' '. $row2['vdetalle_precio'] . '</td>
            <td>' . $row2['vdetalle_cantidad'] . '</td>
			<td>' . $row2['vdetalle_descuento'] . '</td>
            <td>' . round($row2['subtotal'], 2) . '</td>
         
        </tr>';
	}

	if ($row1['venta_impuesto'] > 0) {

		$html .= '
        <tr >
            <td colspan="5" style="text-align:center;font-size:12px">------------------------------------------------------------------------------</td>
	            <td  style="text-align:center;font-size:11px">    </td>
          </tr>
          
          <tr>
            <td colspan="4" style="text-align:right;font-size:12px">SUBTOTAL '.$row1['confi_moneda'].' :</td>
            <td style="text-align:right;font-size:12px">' . round(($row1['venta_total'] - $row1['venta_impuesto'] + $row1['venta_descuento']), 5) . '</td>
          </tr>
          <tr> 
            <td colspan="4" style="text-align:right;font-size:12px">'.$row1['confi_tipo_igv'].' ' . ($row1['venta_porcentaje'] * 100) . '%  '.$row1['confi_moneda'].':</td>
            <td style="text-align:right;font-size:12px">' . $row1['venta_impuesto'] . '</td>
          </tr>
		  <tr> 
		  <td colspan="4" style="text-align:right;font-size:12px">DESC. ' . $row1['confi_moneda'] . ':</td>
		  <td style="text-align:right;font-size:12px">' . $row1['venta_descuento'] . '</td>
		</tr>
          <tr>
            <td colspan="4" style="text-align:right;font-size:12px"><b>TOTAL ' . $row1['confi_moneda'] . ' :</b></td>
	        <td  style="text-align:right;font-size:12px"><b>' . $row1['venta_total'] . '</b></td>
          </tr>
		  ';
		} else {
			$html .= '
			<tr >
            <td colspan="5" style="text-align:center;font-size:12px">----------------------------------------------------------------------------</td>
	            <td  style="text-align:center;font-size:11px">    </td>
          </tr>
			
         
          <tr>
            <td colspan="4" style="text-align:right;font-size:12px">SUBTOTAL ' . $row1['confi_moneda'] . ':</td>
	        <td  style="text-align:right;font-size:12px"><b>' . round(($row1['venta_total'] + $row1['venta_descuento']), 5) . '</b></td>
          </tr>
		  <tr>
            <td colspan="4" style="text-align:right;font-size:12px">DESC. ' . $row1['confi_moneda'] . ':</td>
	        <td  style="text-align:right;font-size:12px"><b>' . $row1['venta_descuento'] . '</b></td>
          </tr>
		  <tr>
            <td colspan="4" style="text-align:right;font-size:12px"><b>TOTAL ' . $row1['confi_moneda'] . ':</b></td>
	        <td  style="text-align:right;font-size:12px"><b>' . $row1['venta_total'] . '</b></td>
          </tr>

			';

		} 
		$html .= '
     
		 <tbody>
 		</table>

 			

	<br>
	<table>
	     <thead>
	     <tr>
            	
            	<td style="text-align:center;font-size:11px"><b>SON:</b> ' . strtoupper($letra) . '</td>

       </tr>
           <tr>
            	
            	<td><br></td><br>

           </tr>
           
           <tr>
	            <td  style=" text-align:center ">
	            <barcode code="' . $row1['cliente_nombres'] . '|' . $row1['cliente_dni'] . '|' . ($row1['venta_comprobante'] . '-' . $row1['venta_serie'] . '-' . $row1['venta_num_comprobante']) . '|' . $row1['venta_total'] . '" type="QR" class="barcode" size="0.5" disableborder="1" />
	            </td>
           </tr>
        	<tr>
            	<td  style="text-align:center;font-size:10px">**MUCHAS GRACIAS POR SU COMPRA**</td>

           </tr>
	     </thead>
	  </table>
         
         ';
}

$css = file_get_contents('css/style_venta_electronica.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();