<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
//$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 130]]);
$query = "SELECT caja.caja_id, 
				caja.caja_descripcion, 
				caja.caja_monto_inicial, 
				caja.caja_monto_final, 
				caja.caja_monto_egreso, 
				caja.caja_fecha_ap, 
				caja.caja_fecha_cie, 
				caja.caja_total_ingreso, 
				caja.caja_total_egreso, 
				caja.caja_monto_total, 
				caja.caja_hora_aper, 
				caja.caja_estado, 
				caja.caja_monto_servicio, 
				caja.caja_total_servicio, 
				caja.caja_hora_cierre, 
				caja.caja_monto_ingreso,
				caja.caja_coun_ingreso,
				configuracion.confi_razon_social,
				(SELECT  IFNULL(SUM(monto_efectivo),0) from venta where   venta_estado = 'PAGADA' and caja_id =   '".$_GET['codigo']."' ) as efectivo,
				(SELECT  IFNULL(SUM(monto_tarjeta),0) from venta where  venta_estado = 'PAGADA' and caja_id =   '".$_GET['codigo']."' ) as tarjeta,
				(SELECT  IFNULL( SUM( venta_total ), 0 ) from venta where   venta_estado = 'PAGADA' and  caja_id =   '".$_GET['codigo']."') as monto_total,

				(SELECT  IFNULL(SUM(monto_efectivo),0) from servicio where   servicio_entrega = 'ENTREGADO' and caja_id =   '".$_GET['codigo']."' ) as efectivo_servi,
				(SELECT  IFNULL(SUM(monto_tarjeta),0) from servicio where  servicio_entrega = 'ENTREGADO' and caja_id =   '".$_GET['codigo']."') as tarjeta_servi,
				(SELECT  IFNULL( SUM( servicio_monto ), 0 ) from servicio where   servicio_entrega = 'ENTREGADO' and  caja_id =   '".$_GET['codigo']."') as monto_total_servi,
				(caja_monto_ingreso + caja_monto_final + caja_monto_servicio) as suma_ingre,
				(caja_monto_ingreso ) as suma_efectivo
				FROM
				caja,
				configuracion
			WHERE caja.caja_id =   '".$_GET['codigo']."'";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	//$totalpagar=($row1['servicio_monto']);
	//Convertimos el total en letras
	//$letra=($v->convertirEurosEnLetras($totalpagar));

	//para ver el logo en la i,presion
	//<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../'.$row1['config_foto'].'" width="45px"></h3><br>

$html.='	
<style>
@page {
	margin: 8mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	odd-footer-name: html_myfooter1;
	}
</style>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.$row1['confi_razon_social'].'</h5><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arqueo de Caja<br>
	-----------------------------------------------------<br>
	
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Ticket N.:&nbsp; 000'.$row1['caja_id'].'&nbsp;</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Apertura&nbsp;:&nbsp; '.$row1['caja_fecha_ap'].' - '.$row1['caja_hora_aper'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Cierre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; '.$row1['caja_fecha_cie'].' - '.$row1['caja_hora_cierre'].'</h6>
	
		 
	------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Monto Apertura&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['caja_monto_inicial'].'</h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Monto Ventas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;$. '.$row1['caja_monto_final'].'&nbsp;('.$row1['caja_total_ingreso'].')</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Monto Servicio&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['caja_monto_servicio'].'&nbsp;&nbsp;('.$row1['caja_total_servicio'].')</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Monto Ingreso&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['caja_monto_ingreso'].'&nbsp;&nbsp;('.$row1['caja_coun_ingreso'].')</h6></b>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Monto Egresos&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['caja_monto_egreso'].'&nbsp;&nbsp;('.$row1['caja_total_egreso'].')</h6></b>
	------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Monto Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['caja_monto_total'].' </h6> 
	
<br>

<br>
<br>


<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Total en Caja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['confi_moneda'].' '.round(($row1['caja_monto_ingreso'] + $row1['efectivo_servi']  + $row1['caja_monto_inicial']+ $row1['efectivo'] - $row1['caja_monto_egreso'] ), 2).'</h6></b>
<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Total Cta Bancaria&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;$.  '.$row1['confi_moneda'].' '.round(($row1['tarjeta'] + $row1['tarjeta_servi']), 2).' </h6></h6></b>

	';








}

//$css = file_get_contents('');
//$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();