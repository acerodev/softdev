<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','orientation' => 'L']);
$mpdf = new \Mpdf\Mpdf();

$query = " SELECT
            p.producto_codigo_general,
            MAX(p.producto_nombre) as nombre, 
            DATE_FORMAT( CURDATE(), '%d/%m/%Y' ) AS fec_actual,
            IFNULL(SUM(k.kardex_ingreso),0) as ingresos,
            IFNULL(sum(k.kardex_salida),0) as salidas,
            -- 	COALESCE ( SUM( k.kardex_ingreso ), 0 ) - COALESCE ( SUM( k.kardex_salida ), 0 ) AS stock_actual 
            IFNULL((SUM(k.kardex_ingreso) - sum(k.kardex_salida) ),SUM(k.kardex_ingreso)) as stock_actual
            FROM
            kardex k INNER JOIN producto p ON
            k.producto_id = p.producto_id 
            WHERE
            k.kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')
            AND k.producto_id = '".$_GET['codigo']."'
            GROUP BY k.producto_id ";

$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {


    $html = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 1</title>
        <link rel="stylesheet" href="" media="all" />
      </head>
      <body>
        <header class="clearfix">
        <style>
            table {
                border-collapse: collapse;
            
                margin-bottom: 1em;
                font-family: Arial, sans-serif;
                font-size: 8px;
                /* color: #333; */
            }
        
            th,
            td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: center;
                /* background-color: #f2f2f2; */
            }
        
            th {
                /* background-color: #ddd; */
                font-weight: bold;
                text-transform: uppercase;
                position: relative;
            }
        
            th img {
                float: left;
                margin-right: 20px;
                max-width: 100px;
                transform: translateY(-50%);
                right: 20px;
                max-width: 100px;
            }
            @page {
                margin: 5mm;
                margin-header: 0mm;
                margin-footer: 0mm;
                odd-footer-name: html_myfooter1;
                }
        </style>
        <table style=" width: 100%;">
        <thead>
            <tr>
                <th colspan="6"  style="color:black;  font-size: 10px;  text-align: center;">
                    <b>REPORTE DETALLADO DE MOVIMIENTOS POR PRODUCTO</b>
                
                </th>
                <th style="color:black;  font-size: 10px;  text-align: right;"> 
                    FECHA: &nbsp; '.$row1['fec_actual'].'
                
                </th>
            </tr>
          
            
        </thead>
    </table>
     

        <table>
        <thead>
            <tr>
                <th colspan="9"  style="color:black;  font-size: 10px; text-align: left;">
                    ARTICULO: &nbsp; &nbsp; '.$row1['nombre'].' &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; STOCK:  &nbsp; &nbsp; '.$row1['stock_actual'].'
                   
                </th>
                
            
            </th>
            </tr>
           
            
            <tr>
                <th style="color:black;   font-size: 9px;"><b>#</b></th>
                <th style="color:black;   font-size: 9px;"><b>CODIGO</b></th>
                <th style="color:black; font-size: 9px;"><b>COMPROBANTE</b></th>
                <th style="color:black; font-size: 9px;"><b>CONCEPTO</b></th>
                <th style="color:black; font-size: 9px;"><b>FECHA</b></th>
                <th style="color:black; font-size: 9px;"><b>ENTRADAS</b></th>
                <th style="color:black; font-size: 9px;"><b>SALIDAS</b></th>
                <th style="color:black; font-size: 9px;"><b>IMEI</b></th>
                <th style="color:black; font-size: 9px;"><b>TECNICO</b></th>
               

            </tr>
        </thead>
        <tbody>';
    $query2 = "SELECT p.producto_codigo_general,
                IFNULL(k.venta_comprobante, '-') as comprobante,
                k.kardex_tipo,
                DATE_FORMAT(k.kardex_fecha, '%d/%m/%Y') as fecha, 
                k.kardex_ingreso,
                k.kardex_salida,
                IFNULL(k.imei, '-') as imei,
                IFNULL(k.tecnico, '-') as tecnico
            FROM
            kardex k INNER JOIN producto p ON
                                k.producto_id = p.producto_id 
            WHERE  kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO') AND 
            k.producto_id = '".$_GET['codigo']."'";
   

    $contador = 0;
    $resultado2 = $mysqli->query($query2);
    while ($row2 = $resultado2->fetch_assoc()) {
        $contador++;

        $html .= '<tr >
   
    <td class="desc"  style=" font-size: 9px; "> '.$contador.'</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['producto_codigo_general'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['comprobante'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['kardex_tipo'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['fecha'] . '</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['kardex_ingreso'] . '</td>
    <td class="desc"  style=" font-size: 9px;  ">' . $row2['kardex_salida'] . '</td>
    <td class="desc"  style=" font-size: 9px;  ">' . $row2['imei'] . '</td>
    <td class="desc"  style=" font-size: 9px;  ">' . $row2['tecnico'] . '</td>
   
    </tr>';
    }


    $html .= '
    <tr>
				
    </tr>
       <tr>
          <td  colspan="1" rowspan="5"  style="  border-left:0px; border-bottom:0px; border-right:0px; ">
      
          </td>
          <td colspan="4" style=" border-left:0px; border-bottom:0px; border-right:0px;">Totales:</td>
          <td class="" style="text-align: right; font-size: 9px; ">' .$row1['ingresos'].'</td>
          <td class="" style="text-align: right; font-size: 9px; ">' .$row1['salidas'].'</td>
      
       </tr>
   
               
            </tbody>
          </table>
         
          
        
        </main>
       
      </body>
    </html>';
}




 $css = file_get_contents('css/style_coti.css');
 $mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();