<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','orientation' => 'L']);
$mpdf = new \Mpdf\Mpdf();

$query = " SELECT
            configuracion.confi_razon_social, 
            configuracion.confi_ruc, 
            configuracion.confi_nombre_representante, 
            configuracion.confi_direccion, 
            configuracion.confi_celular, 
            configuracion.confi_telefono, 
            configuracion.confi_correo, 
            configuracion.config_foto, 
            configuracion.confi_estado, 
            configuracion.confi_url, 
            configuracion.confi_moneda,
            recepcion.rece_id, 
            recepcion.cliente_id, 
            cliente.cliente_nombres, 
            cliente.cliente_celular, 
            cliente.cliente_dni, 
            cliente.cliente_correo, 
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
            recepcion.rece_fentrega, 
            recepcion.marca_id, 
            marca.marca_descripcion,
            recepcion.enciende,
            recepcion.tactil,
            servicio.servicio_comentario as diagnostico,
            servicio.servicio_obser as observacion,
            servicio.servicio_responsable,
            DATE_FORMAT(servicio.servicio_fregistro, '%d/%m/%Y') as servicio_fregistro,
            servicio.servicio_entrega as serv_estado,
            (SELECT SUM(rei.monto_ri) as tott FROM recep_insumos rei where rei.rece_id = '" . $_GET['codigo'] . "') as total_rece_insumo,
            (SELECT SUM(re.monto) FROM recep_equipo re  where re.rece_id = '" . $_GET['codigo'] . "') as total_rece_equi,
            (SELECT IFNULL(SUM(re2.abono),0) FROM recep_equipo re2  where re2.rece_id = '" . $_GET['codigo'] . "') as total_rece_abono,
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
            INNER JOIN servicio
			ON servicio.rece_id = recepcion.rece_id


            where recepcion.rece_id =  '" . $_GET['codigo'] . "'";

$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {

    $pendiente =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']  - $row1['total_rece_abono'] , 2, '.', '')) ;
    $totalpagar =(number_format ((float)$row1['total_rece_equi']  + $row1['total_rece_insumo']   , 2, '.', '')) ;


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
            margin: 7mm;
            margin-header: 0mm;
            margin-footer: 0mm;
            odd-footer-name: html_myfooter1;
            }
        </style>
        <table style=" width: 100%;">
            <thead>
                <tr>
                
                <th width="90%"  style="color:black;  font-size: 11px;  text-align: left; border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;">
                        <b>' . $row1['confi_razon_social'] . ' </b> <br> 
                        R.U.C ' . $row1['confi_ruc'] . '<br> 
                        ' . $row1['confi_direccion'] . '<br> 
                        Tel. :' . $row1['confi_telefono'] . ' -   Movil. : ' . $row1['confi_celular'] . '<br> 
                        ' . $row1['confi_correo'] . '
                    
                </th>
                <th width="20%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; "><img src="../' . $row1['config_foto'] . '" width="80px">
                </th>
           
                   
                 
                </tr>
          
            
            </thead>

        </table>
       
     

        <table>
        <thead>
            <tr>
                <th colspan="7"  style="color:black; font-size: 12px; text-align: center;">
                <b>CONSTANCIA DE ENTREGA</b> &nbsp; 
                   
                </th>
        
            </tr>
            
 
        </thead>
            <tbody>
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"><b>N. REPARACION:</b> &nbsp; R-000'.$row1['rece_id'].'</td>
                
                <td colspan="5" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-left:0px; border-bottom:0px; border-top:0px;"><b>FECHA DEPOSITO:</b> &nbsp; '.$row1['rece_fregistro'].'</td>
            </tr>
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-bottom:0px; border-top:0px;"><b>CLIENTE:</b> &nbsp;'.$row1['cliente_nombres'].'</td>
                <td colspan="5" style="color:black; margin: 95em 0; font-size: 11px; text-align: left; border-left:0px; border-bottom:0px; border-top:0px;"><b>DNI:</b> &nbsp; '.$row1['cliente_dni'].'</td>
            </tr>
            
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px; border-bottom:0px; border-top:0px;"><b>REPARACION:</b> &nbsp;'.$row1['rece_concepto'].'</td>
                <td colspan="5" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-left:0px; border-bottom:0px; border-top:0px;"><b>TOTAL:</b> &nbsp; '.$row1['confi_moneda'].' '. $totalpagar.'</td>
            </tr>
           
             <tr>
                <td colspan="7" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-bottom:0px; border-top:0px;"><b>OBSERVACIONES:</b> &nbsp;'.$row1['diagnostico'].'</td>
             
            </tr>
           
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-top:0px;"><b>TECNICO:</b> &nbsp;'.$row1['servicio_responsable'].'</td>
                <td colspan="5" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-left:0px;  border-top:0px;"><b>FECHA ENTREGA:</b> &nbsp; '.$row1['servicio_fregistro'].'</td>
         
            </tr>
           
                
            </tbody>
        </table>

        <table>
        <thead>
        <tr>
            <th colspan="8"  style="color:black; font-size: 11px; text-align: center;">
                <b>EQUIPOS</b> 
               
            </th>
    
        </tr>
        <tr>
            <th colspan="2"  style="color:black; font-size: 11px; text-align: center;">
                <b>DESCRIPCION</b>
            
            </th>
            <th colspan="2"  style="color:black; font-size: 11px; text-align: center;">
                <b> SERIE / IMEI</b> 
            
            </th>
            <th colspan="2"  style="color:black; font-size: 11px; text-align: center;">
                <b>FALLA</b>
            
            </th>

            <th colspan="1"  style="color:black; font-size: 11px; text-align: center;">
                <b> ABONO</b> 
            
            </th>
           
            
            <th colspan="1"  style="color:black; font-size: 11px; text-align: center;">
                <b> MONTO</b> 
            
            </th>
            

        </tr>
        

    </thead>
            <tbody>';
            $query2 = "	SELECT
                        r.rece_id, 
                            re.equipo,
                            re.serie,
                            re.monto,
                            re.falla,
                            re.abono
                    
                    FROM
                        recepcion r
                    INNER JOIN
                        recep_equipo re ON r.rece_id = re.rece_id
                    WHERE
                        r.rece_id ='".$row1['rece_id'] ."' ";

                $contador = 0;
                $resultado2 = $mysqli->query($query2);
                while ($row2 = $resultado2->fetch_assoc()) {
                    $contador++;

                    $html .=
                    '<tr >
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;    border-top:0px;">'.$row2['equipo'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;  border-top:0px;"> '.$row2['serie'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: left;  border-top:0px;"> '.$row2['falla'].'</td>
                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;  border-top:0px;"> '.$row2['abono'].'</td>
                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;  border-top:0px;"> '.$row2['monto'].'</td>
                   
                     </tr>
                    ';
                }
                $html .='
                <tr >
                <td colspan="7" style=" border-left:0px; border-bottom:0px; border-right:0px;">Adelanto:</td>
                <td colspan="1" style="text-align: right; font-size: 10px; ">'.$row1['confi_moneda'].' '.$row1['rece_adelanto'].'</td>
        
            </tr>

             <tr >
                <td colspan="7" style=" border-left:0px; border-bottom:0px; border-right:0px;  border-top:0px;">Pendiente:</td>
                <td colspan="1" style="text-align: right; font-size: 10px; ">'.$row1['confi_moneda'].' '.$row1['rece_debe'].'</td>
                
             </tr>

             <tr >
                <td colspan="7" style=" border-left:0px; border-bottom:0px; border-right:0px;  border-top:0px;">Total:</td>
                <td colspan="1" style="text-align: right; font-size: 10px; ">'.$row1['confi_moneda'].' '.$row1['rece_monto'].'</td>
             
             </tr>';

                $html .= '
            
                
            </tbody>
        </table> ';

                if($row1['contador_insumo'] > 0) {


                    $html .='

             

        <table>
            <thead>
                <tr>
                    <th colspan="8"  style="color:black; font-size: 11px; text-align: center;">
                        <b>INSUMOS</b> 
                    
                    </th>
            
                </tr>
                <tr>
                    <th colspan="4"  style="color:black; font-size: 11px; text-align: center;">
                        <b>DESCRIPCION</b>
                    
                    </th>
                    <th colspan="2"  style="color:black; font-size: 11px; text-align: center;">
                        <b> CANTIDAD</b> 
                    
                    </th>
                
                    <th colspan="2"  style="color:black; font-size: 11px; text-align: center;">
                        <b>MONTO</b> 
                    
                    </th>
                    

                </tr>
                

            </thead>
            <tbody>';
            $query3 = "	SELECT
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

                    $html .=
                    '<tr >
                    <td colspan="4" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;    border-top:0px;">'.$row3['producto_nombre'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;  border-top:0px;"> '.$row3['cantidad'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: left;  border-top:0px;"> '.$row3['subtotal'].'</td>
                    
                   
                     </tr>
                    ';
                }
                        $html .='
                        <tr >
                        <td colspan="6" style=" border-left:0px; border-bottom:0px; border-right:0px;">Total:</td>
                        <td colspan="2" style="text-align: right; font-size: 10px; "> '.$row1['confi_moneda'].' '.$row1['total_rece_insumo'].'</td>
                
                        </tr>
                    
          
            </tbody>
        </table>';

    } else {
      

    }
    $html .='


        <p align="justify" style="font-size: 10.5px; color:#404040;">CLAUSULAS: </p>
        <p align="justify" style="font-size: 10.5px; color:#404040;">  1:'.$row3['subtotal'].' Si el dispositivo no se puede verificar, no asumimos responsabilidad por componentes que no funcionen correctamente despu&eacute;s de la reparaci&oacute;n. 
        2: Las reparaciones de pantallas no tienen garant&iacute;a en caso de golpes, humedad o mal uso por parte del cliente. 
        3: En algunas reparaciones, no se usar&aacute;n piezas originales, sino compatibles y de calidad.  
        4: La firma del cliente autoriza a <b>'.$row1['confi_razon_social'].'</b> para realizar trabajos en los dispositivos entregados.
        5: Despu&eacute;s de que <b>'.$row1['confi_razon_social'].'</b> informe al cliente sobre el estado de su dispositivo, si pasan 60 d&iacute;as, la empresa no se hace responsable del mismo.
        6: TODAS NUESTRAS REPARACIONES TIENEN 3 MESE DE GARANTIA.
        </p>
        <br><br>
        <table>
        <thead>
       
            
 
        </thead>
        <tbody>
        <tr>
            <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"><b>FIRMA CLIENTE</b> </td>
            
            <td colspan="4" style="color:black; margin:  95em 0; font-size: 12px; text-align: left;  border-bottom:0px; border-right:1px; border-left:0px;  border-top:0px;"><b></b> &nbsp; </td>
            <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"><b>FIRMA ENCARGADO</b> </td>
        </tr>
        <tr>
            <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"> </td>
            
            <td colspan="4" style="color:black; margin:  95em 0; font-size: 12px; text-align: left;  border-bottom:0px; border-right:1px; border-left:0px;  border-top:0px;"></td>
            <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"></td>
        </tr>
        <tr>
        <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"> </td>
        
        <td colspan="4" style="color:black; margin:  95em 0; font-size: 12px; text-align: left;  border-bottom:0px;  border-right:1px;border-left:0px;  border-top:0px;"></td>
        <td colspan="2" style="color:black; margin:  95em 0; font-size: 12px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;"></td>
    </tr>
       
       
            
        </tbody>
        </table>
         
        
        </main>
       
      </body>
    </html>';
}




$css = file_get_contents('css/style_coti.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
