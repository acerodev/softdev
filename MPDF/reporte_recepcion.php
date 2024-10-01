<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 187]]);
$query = "SELECT
		MAX(configuracion.confi_razon_social) as confi_razon_social,
	MAX(configuracion.confi_ruc) as confi_ruc, 
	MAX(configuracion.confi_nombre_representante) as confi_nombre_representante, 
	MAX(configuracion.confi_direccion) as confi_direccion, 
	MAX(configuracion.confi_celular) as confi_celular, 
	MAX(configuracion.confi_telefono) as confi_telefono, 
	MAX(configuracion.confi_correo) as confi_correo, 
	MAX(configuracion.config_foto) as config_foto, 
	MAX(configuracion.confi_estado) as confi_estado, 
	MAX(configuracion.confi_url) as confi_url, 
	MAX(configuracion.confi_moneda) as confi_moneda,
	recepcion.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_celular, 
	cliente.cliente_dni, 
	recepcion.rece_equipo, 
	recepcion.rece_caracteristicas, 
	recepcion.motivo_id, 
	motivo.motivo_descripcion, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as motivo,
	recepcion.rece_concepto, 
	recepcion.rece_monto, 
	DATE_FORMAT(recepcion.rece_fregistro, '%d/%m/%Y') as rece_fregistro,
	recepcion.rece_estado, 
	recepcion.rece_adelanto, 
	recepcion.rece_debe,
	recepcion.rece_accesorios, 
	DATE_FORMAT(recepcion.rece_fentrega, '%d/%m/%Y') as rece_fentrega,
	recepcion.marca_id, 
	marca.marca_descripcion,
	GROUP_CONCAT(CONCAT('  ' , recep_equipo.equipo ,  '   (  ',  recep_equipo.monto , '  ) ' )) as equipos,
	(SELECT COUNT(*)  FROM recep_insumos r2 where r2.rece_id = '" . $_GET['codigo'] . "') as contador_insumo
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

	where recepcion.rece_id =  '".$_GET['codigo']."'";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){



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
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">R.U.C '.$row1['confi_ruc'].'</h5><br>
	

	
	<p style="font-size: 10px; margin:  4px 0;"> <b>N. Orden:&nbsp; R-000'.$row1['rece_id'].'</b>&nbsp;&nbsp; - &nbsp;&nbsp;'.$row1['rece_fregistro'].'</p>
	<p style="font-size: 10px; margin:  4px 0;"> Cliente:&nbsp; '.$row1['cliente_nombres'].'</p>
	<p style="font-size: 10px; margin:  4px 0;"> Observaciones:&nbsp; '.$row1['rece_concepto'].'</p>
	<p style="font-size: 10px; margin:  4px 0;"> Estado:&nbsp;<b> '.$row1['rece_estado'].'</p>
	<p style="font-size: 10px; margin:  4px 0;"> F. Entrega:&nbsp; '.$row1['rece_fentrega'].'</p> <br>
	
	<p style="font-size: 10px; margin:  4px 0;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Datos del Equipo</b></p>

	';
	
	$html .= '


	<table   class="tabla-punteada">
        <thead>

          <tr>  
            <th style=" border-left:0px; font-size: 8px; border-right:0px;">EQUIPO</th>
            <th style=" border-left:0px; font-size: 8px; border-right:0px; text-align:center;" >FALLA</th>
			<th style=" border-left:0px; font-size: 8px; border-right:0px;">MONTO</th>
			           
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
						recep_equipo WHERE rece_id = '".$_GET['codigo']."'";
			$contador = 0;
			$resultado2 = $mysqli->query($query2);
			while ($row2 = $resultado2->fetch_assoc()) {
				$contador++;

				$html .= '
				<tr>
					
					<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row2['equipo'].'</td>
					<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row2['falla'].'</td>
					<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row2['monto'].'</td>
					
					
				
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
		<br>
		
		
		<p style="font-size: 10px; margin:  4px 0;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Insumos</b></p>
		';







		if($row1['contador_insumo'] > 0) {


            $html .='
			<table   class="tabla-punteada">
			<thead>
	
			  <tr>  
				<th style=" border-left:0px; font-size: 8px; border-right:0px;">DESCRIPCION</th>
				<th style=" border-left:0px; font-size: 8px; border-right:0px; text-align:center;" >CANTIDAD</th>
				<th style=" border-left:0px; font-size: 8px; border-right:0px;">MONTO</th>
						   
			  </tr>
			 
	
			 
			</thead>
	
			<tbody>';
			$query3 = "SELECT
							ri.id_insumo,
							p.producto_nombre,
							ri.cantidad,
							p.producto_pventa,
							ri.monto_ri as subtotal,
							ri.rece_id,
							ri.producto_id,
							ri.fecha
						FROM
							recep_insumos ri
							INNER JOIN producto p ON ri.producto_id = p.producto_id
						WHERE ri.rece_id = '" . $_GET['codigo'] . "'
					GROUP BY
					ri.id_insumo, p.producto_nombre, ri.cantidad, p.producto_pventa, ri.monto_ri, ri.rece_id, ri.producto_id, ri.fecha";

				$contador = 0;
				$resultado3 = $mysqli->query($query3);
				while ($row3 = $resultado3->fetch_assoc()) {
					$contador++;
					
					$html .= '
					<tr>
						
						<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row3['producto_nombre'].'</td>
						<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row3['cantidad'].'</td>
						<td style=" border-left:0px; font-size: 8px; border-right:0px; border-top:0px;  border-bottom:0px;">'.$row3['subtotal'].'</td>
						
						
					
					</tr>';
				}
				$html .= '
				</tbody>
				<tfoot>
				<tr>
				  <td colspan="3" style=" border-left:0px;  border-right:0px;  border-top:0px;">	</td>
				</tr>
			  </tfoot>
			</table>';


		} else {


        }

		$html .='
			<br>
		';


		if ($row1['rece_adelanto'] > 0) {
			$html.='
		<h4 style="text-align:right;display: inline-block; font-size: 10px; margin: 0px;padding: 0px;  font-weight:normal;">Adelanto '.$row1['confi_moneda'].': '.$row1['rece_adelanto'].'</h4>
		<h4 style="text-align:right;display: inline; font-size: 10px; margin: 0px;padding: 0px;  font-weight:normal;">Pendiente '.$row1['confi_moneda'].': '.$row1['rece_debe'].'</h4>
		<h4 style="text-align:right; margin: 0px;padding: 0px; font-size: 10px; ">Monto '.$row1['confi_moneda'].': '.$row1['rece_monto'].'</h4><br>';
		}else{
				$html.='<h4 style="text-align:right; margin: 0px;padding: 0px; ">Monto: '.$row1['confi_moneda'].' '.$row1['rece_monto'].'</h4><br>';
			}

		$html.='



			<h4 style="text-align:center; margin: 0px;padding: 0px; "><barcode code="'.$row1['confi_url'].'" type="QR" class="barcode" size="0.7" disableborder="1" /></h4><br><br>
		
			
			';









}



$css = file_get_contents('css/style_venta_electronica.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();