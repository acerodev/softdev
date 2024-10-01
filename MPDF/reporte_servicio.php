<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 190]]);
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

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	$pendiente =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']  - $row1['total_rece_abono'] , 2, '.', '')) ;
  $totalpagar =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']   , 2, '.', '')) ;
	//Convertimos el total en letras
	$solesmoned = ($row1['confi_moneda1']);
	$centimosmoned = ($row1['confi_moneda2']);
	//Convertimos el total en letras
	$letra=$v->convertirEurosEnLetras($totalpagar, $solesmoned, $centimosmoned);

	//para ver el logo en la i,presion
	//<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../'.$row1['config_foto'].'" width="45px"></h3><br>

$html.='	
<style>
.tabla-punteada {
	border-collapse: collapse;
	width: 100%;
  }
  
  .tabla-punteada th, .tabla-punteada td {
	border: 1px dotted #000; /* Líneas punteadas en color negro */
	padding: 8px; /* Ajusta el espaciado interno de las celdas según sea necesario */
	text-align: left; /* Ajusta la alineación del texto según sea necesario */
  }
@page {
	margin: 3mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	odd-footer-name: html_myfooter1;
	}
</style>
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.$row1['confi_razon_social'].'</h3>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">'.$row1['confi_direccion'].'</h5>	
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">R.U.C '.$row1['confi_ruc'].'</h5>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Movil. '.$row1['confi_celular'].'</h5><br>
	

	<b>Ticket N.:</b>&nbsp; T-000'.$row1['servicio_id'].'&nbsp;&nbsp; - &nbsp;&nbsp;'.$row1['servicio_fregistro'].' <br>
	<b>Cliente:</b>&nbsp; '.$row1['cliente_nombres'].'<br>
	<b>Dni:</b>&nbsp; '.$row1['cliente_dni'].'<br>
	<b>Ref.:</b>&nbsp; R-000'.$row1['rece_id'].'<br>
	Estado:&nbsp;<b> '.$row1['servicio_entrega'].'</b><br>
	F. Entrega:&nbsp; '.$row1['servicio_fregistro'].'<br>
	<br>
		        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Datos del Servicio</b><br>
';
$html .= '<br>
	<table   class="tabla-punteada">
        <thead>

          <tr>  
            <th style=" border-left:0px;  border-right:0px;">#</th>
            <th style=" border-left:0px;  border-right:0px; text-align:center;" >DESCRIPCION</th>
			<th style=" border-left:0px;  border-right:0px;">SBTOTAL</th>
			           
          </tr>
		 

         
        </thead>

        <tbody>';
			$query2 = "SELECT
						equipo,
						serie,
						monto,
						abono,
						falla 
					FROM
						recep_equipo WHERE rece_id = '".$row1['rece_id']."'";
			$contador = 0;
			$resultado2 = $mysqli->query($query2);
			$query3 = "SELECT
                ri.producto_id,
                CONCAT(p.producto_nombre, ' (', ri.cantidad,')') as nombre_pro,
                ri.cantidad,
                ri.monto_ri
              FROM
                recep_insumos ri INNER JOIN producto p ON ri.producto_id = p.producto_id
              WHERE
                ri.rece_id = '" . $row1['rece_id'] . "'";
	
	$resultado3 = $mysqli->query($query3);

			while ($row2 = $resultado2->fetch_assoc()) {
				$contador++;

				$html .= '
				<tr>
					
					<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;">'.$contador.'</td>
					<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;">'.$row1['motivo_descripcion'] .' -'.$row2['equipo'].'</td>
					<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;">'.$row2['monto'].'</td>
					
					
				
				</tr>';
			}
			while ($row3 = $resultado3->fetch_assoc()) {
				$contador++;
			
				$html .= '<tr >
				<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;">' . $contador . '</td>
				<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;">'.$row3['nombre_pro'] .'</td>  
				<td style=" border-left:0px;  border-right:0px; border-top:0px;  border-bottom:0px;"> '.number_format ((float)$row3['monto_ri']  , 2, '.', '').'</td>
						</tr>';
					}
			$html .= '
			</tbody>
			<tfoot>
			<tr>
			  <td colspan="3" style=" border-left:0px;  border-right:0px;  border-top:0px;">	</td>
			</tr>
		  </tfoot>
		</table>

		';
			$html.='
		<h4 style="text-align:right;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Adelanto '.$row1['confi_moneda'].': '.$row1['total_rece_abono'].'</h4>
		<h4 style="text-align:right;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">Pendiente '.$row1['confi_moneda'].':  '.$pendiente.' </h4>
		<h4 style="text-align:right; margin: 0px;padding: 0px; ">Monto '.$row1['confi_moneda'].': '.$totalpagar.' </h4><br>

		<h4 style="text-align:left; margin: 0px;padding: 0px; font-weight:normal;">SON: ' . strtoupper($letra) . ' </h4><br>

		

			<h4 style="text-align:center; margin: 0px;padding: 0px; "><barcode code="'.$row1['confi_url'].'" type="QR" class="barcode" size="0.7" disableborder="1" /></h4><br><br>
		
			
			';












}

//<td style="text-align:left;font-size:11px"><b>SON:</b> '.strtoupper($letra).'</td>

$css = file_get_contents('css/style_rece.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();