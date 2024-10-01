<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 60]]);
$query = "SELECT
				re.id_equipo, 
				re.equipo, 
				re.serie, 
				re.monto, 
				re.abono, 
				re.falla, 
				re.rece_id,
				c.confi_razon_social,
				r.cliente_id,
				cl.cliente_nombres,
				DATE_FORMAT(r.rece_fregistro, '%d/%m/%Y') as rece_fregistro 

			FROM
				recep_equipo AS re INNER JOIN recepcion r ON
				re.rece_id = r.rece_id
				INNER JOIN cliente cl ON
				r.cliente_id = cl.cliente_id,
				configuracion AS c
				WHERE
				re.id_equipo = '".$_GET['codigo']."'";

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
		<tbody>
		
			

				<tr>
						<td colspan="1" style="text-align:left;" ><b>N. Orden&nbsp;:</b></td> 
						<td colspan="3" style="text-align:left;" >R-000'.$row1['rece_id'].'&nbsp; - &nbsp;'.$row1['rece_fregistro'].' </td>  
					
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Cliente:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row1['cliente_nombres'].' </td>  
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Equipo:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row1['equipo'].' </td>  
				</tr>

				<tr>
						<td colspan="1" style="text-align:left;" ><b>Serie / Imei:</b> </td> 
						<td colspan="6" style="text-align:left;" >'.$row1['serie'].' </td>  
				</tr>
				

			
		
		
				
		</tbody>';
		
	

	$html .= '
	</table>';




}

$css = file_get_contents('css/style_coti.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();