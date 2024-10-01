<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 50]]);
$query = "SELECT
	MAX(configuracion.confi_razon_social) as confi_razon_social,
	MAX(configuracion.confi_ruc) as confi_ruc, 
	MAX(configuracion.confi_nombre_representante) as confi_nombre_representante, 
	MAX(configuracion.confi_direccion) as confi_direccion, 
	MAX(configuracion.confi_celular) as confi_celular, 

	recepcion.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	recepcion.rece_equipo, 
	recepcion.rece_caracteristicas, 
	recepcion.motivo_id, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as motivo,
	recepcion.rece_concepto, 
	DATE_FORMAT(recepcion.rece_fregistro, '%d/%m/%Y') as rece_fregistro,
	recepcion.rece_fentrega, 
	recepcion.marca_id, 
    recepcion.rece_serie, 
	recepcion.rece_cod,
	-- recep_equipo.serie
	-- GROUP_CONCAT(CONCAT('  ' , recep_equipo.equipo ,  '  (',  recep_equipo.serie , ') ' )) AS equipos
	 GROUP_CONCAT(CONCAT(  '  ',  recep_equipo.serie , ' ' )) AS equipos
FROM
	configuracion,
	recepcion
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
	INNER JOIN
	motivo
	ON 
		recepcion.motivo_id = motivo.motivo_id
	INNER JOIN
	marca
	ON 
		recepcion.marca_id = marca.marca_id 
	INNER JOIN recep_equipo ON
		recepcion.rece_id = recep_equipo.rece_id

	where recepcion.rece_id =  '".$_GET['codi']."'";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){



$html.='
<style>
@page {
	margin: 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	odd-footer-name: html_myfooter1;
	}
</style>

	<table>
		<thead>
			<tr>
					<th colspan="7" style="text-align:center;" ><b>'.$row1['confi_razon_social'].'</b>
					</th>  
					
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
			while ($row2 = $resultado2->fetch_assoc()) {
				$contador++;
	
				$html .= '
		
				<tr>
						<td colspan="1" style="text-align:left;" ><b>N. Orden&nbsp;:</b></td> 
						<td colspan="3" style="text-align:left;" >R-000'.$row1['rece_id'].' &nbsp;&nbsp; - &nbsp;&nbsp; '.$row1['rece_fregistro'].'</td>  
					
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Cliente:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row1['cliente_nombres'].' </td>  
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Equipo:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row2['equipo'].' </td>  
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Serie:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row2['serie'].' </td>  
				</tr>
				

			
		
		
				
		</tbody>';
		
	}

	$html .= '
	</table>';




}

$css = file_get_contents('css/style_coti.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();