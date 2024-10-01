<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//$mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 50]]);
$query = "SELECT
	producto.producto_id,
	producto.producto_codigo,
	producto.producto_codigo_general,
	producto.producto_nombre,
	producto.producto_fregistro 
FROM
	producto

	where producto.producto_id =  '".$_GET['codigo']."'";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){



$html.='
<style>
@page {
	margin: 3mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	odd-footer-name: html_myfooter1;
	}

</style>

	  <table style="text-align:center;">
	      <thead>
          <tr>
            	<td style="text-align:center;">
	            <barcode code="'.$row1['producto_codigo_general'].'" type="QR" class="barcode" size="0.9" disableborder="1" />
	            </td>
              </tr>
              <tr>
	           	<td style="text-align:center;" ><b>'.$row1['producto_codigo_general'].'</b></td>  
	        </tr>
	      </thead>
	  </table>

    
         ';









}

//$css = file_get_contents('css/style_rece.css'); CODABAR o QR
//$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();