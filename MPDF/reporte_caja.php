<?php
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';*/


require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
//$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 180]]);
$query = "SELECT caja.caja_id, 
				caja.caja_descripcion, 
				caja.caja_monto_inicial, 
				caja.caja_monto_final , 
				caja.caja_monto_egreso, 
				DATE_FORMAT(caja.caja_fecha_ap, '%d/%m/%Y') as caja_fecha_ap,
				DATE_FORMAT(caja.caja_fecha_cie, '%d/%m/%Y') as caja_fecha_cie,

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
				(SELECT  IFNULL(SUM(monto_efectivo),0) from venta where   venta_estado = 'PAGADA' and caja_id =   '".$_GET['codigo']."' ) as efectivo,
				(SELECT  IFNULL(SUM(monto_tarjeta),0) from venta where  venta_estado = 'PAGADA' and caja_id =   '".$_GET['codigo']."' ) as tarjeta,
				(SELECT  IFNULL( SUM( venta_total ), 0 ) from venta where   venta_estado = 'PAGADA' and  caja_id =   '".$_GET['codigo']."') as monto_total,
				(SELECT  IFNULL(SUM(monto_efectivo),0) from servicio where   servicio_entrega = 'ENTREGADO' and caja_id =   '".$_GET['codigo']."' ) as efectivo_servi,
				(SELECT  IFNULL(SUM(monto_tarjeta),0) from servicio where  servicio_entrega = 'ENTREGADO' and caja_id =   '".$_GET['codigo']."') as tarjeta_servi,
				(SELECT  IFNULL( SUM( servicio_monto ), 0 ) from servicio where   servicio_entrega = 'ENTREGADO' and  caja_id =   '".$_GET['codigo']."') as monto_total_servi,
				configuracion.confi_razon_social,
					configuracion.confi_correo,
				configuracion.confi_moneda,
				(caja_monto_ingreso + caja_monto_final + caja_monto_servicio) as suma_ingre,
				(caja_monto_ingreso ) as suma_efectivo
				FROM
				caja,
				configuracion
				WHERE caja.caja_id =   '".$_GET['codigo']."'";
	
	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	$estado = $row1['caja_estado'];
	$correoEmpresa = $row1['confi_correo'];
	$razon = $row1['razon_social'];


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
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.$row1['razon_social'].'</h5><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arqueo de Caja<br>
	------------------------------------------------------<br>
	
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Ticket N.:&nbsp; 000'.$row1['caja_id'].'&nbsp;</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Apertura&nbsp;:&nbsp; '.$row1['caja_fecha_ap'].' - '.$row1['caja_hora_aper'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Cierre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; '.$row1['caja_fecha_cie'].' - '.$row1['caja_hora_cierre'].'</h6>
	
		 
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">-------------------- Detalle Venta -------------------</h5>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Efectivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.round(($row1['efectivo'] ), 2).' </h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Tarjeta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.round(($row1['tarjeta']   ), 2).' </h6>
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">-------------------- Detalle Serv. -------------------</h5>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Efectivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.round(( $row1['efectivo_servi']  ), 2).' </h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Tarjeta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.round(( $row1['tarjeta_servi'] ), 2).' </h6>  
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">------------------- Detalle General -----------------</h5>


	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Monto Inicial&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.$row1['caja_monto_inicial'].' <b></h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> Ingresos (v+i+s)&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; '.$row1['confi_moneda'].'  '. $row1['suma_ingre'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> Gastos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.$row1['caja_monto_egreso'].' </h6>
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">--------------- Detalle Cuadre Final ------------</h5>


	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Ingresos Totales&nbsp;&nbsp;&nbsp;:</b> &nbsp;&nbsp;'.$row1['confi_moneda'].'.  '. $row1['suma_ingre'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Egresos Totales&nbsp;&nbsp;&nbsp; :</b> &nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.round(( $row1['caja_monto_egreso'] ), 2).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Saldo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> &nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.round(($row1['suma_ingre']  - $row1['caja_monto_egreso'] ), 2).'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Monto Inicial + Saldo&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.$row1['caja_monto_total'].' </b></h6>
	
	------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px;">Total en Caja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.round(($row1['suma_efectivo']  + $row1['caja_monto_inicial']+ $row1['efectivo'] + $row1['efectivo_servi'] - $row1['caja_monto_egreso']), 2).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Total Cta Bancaria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'. '.round(($row1['tarjeta']  + $row1['tarjeta_servi'] ), 2).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Total Cuadre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['confi_moneda'].'.  '.$row1['caja_monto_total'].' </h6>
	------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px; font-weight:normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRACIAS POR SU PREFERENCIA</h6>
	------------------------------------------------------<br>
	';



}

//$css = file_get_contents('');
//$mpdf->WriteHTML($css,1);
/*$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
$pdf = $mpdf->Output("", 'D');*/

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();

