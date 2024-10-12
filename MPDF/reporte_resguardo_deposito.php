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
            recepcion.imagen,
            recepcion.vibra,
            recepcion.cobertura,
            recepcion.sensor,
            recepcion.carga,
            recepcion.bluetoo,
            recepcion.wifi,
            recepcion.huella,
            recepcion.home,
            recepcion.lateral,
            recepcion.camara,
            recepcion.bateria,
            recepcion.auricular,
            recepcion.micro,
            recepcion.face,
            recepcion.tornillo,
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


            where recepcion.rece_id =  '" . $_GET['codigo'] . "'";

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
                        R.U.C '.$row1['confi_ruc'].'<br> 
                        ' . $row1['confi_direccion'] . '<br> 
                        Tel. :' . $row1['confi_telefono'] . ' -   Movil. : ' . $row1['confi_celular'] . '<br> 
                        '.$row1['confi_correo'].'
                    
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
                    <b>CONSTANCIA DE DEPOSITO [R-000' . $row1['rece_id'] . ']</b> &nbsp; 
                    
                    </th>

                </tr>
            
    
            </thead>
            <tbody>
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;   border-bottom:0px; "><b>CLIENTE:</b> &nbsp;'.$row1['cliente_nombres'].'</td>
                
                <td colspan="5" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-left:0px; border-bottom:0px; "><b>FECHA:</b> &nbsp; '.$row1['rece_fregistro'].'</td>
            </tr>
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-bottom:0px; border-top:0px;"><b>DNI:</b> &nbsp;'.$row1['cliente_dni'].'</td>
                <td colspan="5" style="color:black; margin: 95em 0; font-size: 11px; text-align: left; border-left:0px; border-bottom:0px; border-top:0px;"><b>MONTO REPARACION:</b> &nbsp; '.$row1['confi_moneda'].' '.$row1['rece_monto'].'</td>
            </tr>
           
            <tr>
                <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px; border-top:0px;"><b>MOVIL:</b> &nbsp;'.$row1['cliente_celular'].'</td>
                <td colspan="5" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-left:0px;  border-top:0px;"><b>OBSERVACION:</b> &nbsp; '.$row1['rece_concepto'].' </td>
            </tr>
            
           
           
                
            </tbody>
        </table>
       
     
              
        <table  style="border-radius: 10px;  border: 1px solid black;">
        <thead>
            <tr>
                <th colspan="7"  style="color:black; font-size: 12px; text-align: center;">
                <b>TEST DE CONTROL </b> &nbsp; 
                   
                </th>
        
            </tr>
            
            
 
             </thead>
                <tbody>
                <tr>
                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;">Enciende:<br>  
                            ';
                                if ($row1['enciende'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['enciende'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>


                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px;  border-bottom:0px; border-top:0px;">Tactil:<br>  
                            ';
                                if ($row1['tactil'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['tactil'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>


                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px; border-bottom:0px; border-top:0px;">Imagen:<br>  
                            ';
                                if ($row1['imagen'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['imagen'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>

                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left;  border-right:0px; border-left:0px; border-bottom:0px; border-top:0px;">Vibracion:<br>  
                            ';
                                if ($row1['vibra'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['vibra'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>

                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px; border-bottom:0px; border-top:0px;">Cobertura:<br>  
                            ';
                                if ($row1['cobertura'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['cobertura'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>

                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left;   border-left:0px; border-bottom:0px; border-top:0px;">Sensor Prox.:<br>  
                            ';
                                if ($row1['sensor'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['sensor'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>

                </tr>

                <tr>
                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;   border-bottom:0px; border-top:0px;">Carga:<br>  
                            ';
                                if ($row1['carga'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['carga'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>


                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px;  border-bottom:0px; border-top:0px;">Bluetoth:<br>  
                                ';
                                if ($row1['bluetoo'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['bluetoo'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                    </td>


                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px; border-bottom:0px; border-top:0px;">Wi-fi:<br>  
                            ';
                            if ($row1['wifi'] == "Si") {

                                    $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                                } else if($row1['wifi'] == "No") { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                                <label class="form-check-label">No</label>
                                ';
                                }
                                    else { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                            }
                            
                            $html .= ' 
                    </td>

                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left;  border-right:0px; border-left:0px; border-bottom:0px; border-top:0px;">Huella:<br>  
                            ';
                            if ($row1['huella'] == "Si") {

                                    $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                                } else if($row1['huella'] == "No") { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                                <label class="form-check-label">No</label>
                                ';
                                }
                                    else { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                            }
                            
                            $html .= ' 
                    </td>

                    <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px; border-bottom:0px; border-top:0px;">Boton Home:<br>  
                            ';
                            if ($row1['home'] == "Si") {

                                    $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                                } else if($row1['home'] == "No") { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                                <label class="form-check-label">No</label>
                                ';
                                }
                                    else { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                            }
                            
                            $html .= ' 
                    </td>

                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 11px; text-align: left;   border-left:0px; border-bottom:0px; border-top:0px;">Botones Laterales:<br>  
                            ';
                            if ($row1['lateral'] == "Si") {

                                    $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                                } else if($row1['lateral'] == "No") { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                                <label class="form-check-label">No</label>
                                ';
                                }
                                    else { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                            }
                            
                            $html .= ' 
                    </td>

                </tr>

                <tr>
                <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;    border-top:0px;">Camara:<br>  
                        ';
                            if ($row1['camara'] == "Si") {

                                    $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                                } else if($row1['camara'] == "No") { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                                <label class="form-check-label">No</label>
                                ';
                                }
                                    else { 
                                    $html .= '
                                    <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                                <label class="form-check-label">Si</label>
                                <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                                <label class="form-check-label">No</label>
                                ';
                            }
                            
                            $html .= ' 
                </td>


                <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px;   border-top:0px;">Salud Bateria:<br>  
                    ';
                        if ($row1['bateria'] == "Si") {

                                $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                            } else if($row1['bateria'] == "No") { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                            <label class="form-check-label">No</label>
                            ';
                            }
                                else { 
                                $html .= '
                                <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                            <label class="form-check-label">Si</label>
                            <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                            <label class="form-check-label">No</label>
                            ';
                        }
                        
                        $html .= ' 
                </td>


                <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px;  border-top:0px;">Auriculares:<br>  
                ';
                    if ($row1['auricular'] == "Si") {

                            $html .= '
                        <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                        } else if($row1['auricular'] == "No") { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                        <label class="form-check-label">No</label>
                        ';
                        }
                            else { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                    }
                    
                    $html .= ' 
                </td>

                <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left;  border-right:0px; border-left:0px;  border-top:0px;">Microfono:<br>  
                ';
                    if ($row1['micro'] == "Si") {

                            $html .= '
                        <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                        } else if($row1['micro'] == "No") { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                        <label class="form-check-label">No</label>
                        ';
                        }
                            else { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                    }
                    
                    $html .= ' 
                </td>

                <td colspan="1" style="color:black; margin:  95em 0; font-size: 11px; text-align: left; border-right:0px;  border-left:0px;  border-top:0px;">Face ID:<br>  
                ';
                    if ($row1['face'] == "Si") {

                            $html .= '
                        <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                        } else if($row1['face'] == "No") { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                        <label class="form-check-label">No</label>
                        ';
                        }
                            else { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                    }
                    
                    $html .= ' 
                </td>

                <td colspan="2" style=" margin:  95em 0; text-align: left; font-size: 11px;   border-left:0px;  border-top:0px;">Tornillos:<br>  
                    ';
                    if ($row1['tornillo'] == "Si") {

                            $html .= '
                        <input class="form-check-input" type="checkbox" name="text_enciende_si" checked="true" >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                        } else if($row1['tornillo'] == "No") { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no" checked="true" >
                        <label class="form-check-label">No</label>
                        ';
                        }
                            else { 
                            $html .= '
                            <input class="form-check-input" type="checkbox" name="text_enciende_si"  >
                        <label class="form-check-label">Si</label>
                        <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                        <label class="form-check-label">No</label>
                        ';
                    }
                    
                    $html .= ' 
                </td> <br> <br>

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
                        r.rece_id ='" . $row1['rece_id'] . "'";
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
                     
                     </tr>           
                
            </tbody>

            

          
        </table>';

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

                    $html .=
                    '<tr >
                    <td colspan="4" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;    border-top:0px;">'.$row3['producto_nombre'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: center;  border-top:0px;"> '.$row3['cantidad'].'</td>
                    <td colspan="2" style="color:black; margin:  95em 0; font-size: 10px; text-align: left;  border-top:0px;"> '.$row3['subtotal'].'</td>
                    
                
                    </tr>
                    ';
                }
                        $html .='
                       
                    
        
            </tbody>
        </table>';

        } else {


        }



        $html .= '
        <p align="justify" style="font-size: 10.5px; color:#404040;">CLAUSULAS: </p>
        <p align="justify" style="font-size: 10.5px; color:#404040;"> <b> 1. Evaluaci&oacute;n Previa: </b> Realizaremos una evaluaci&oacute;n inicial del/los dispositivo(s) para determinar las reparaciones necesarias antes de proceder. <br>      
        <b> 2. Autorizaci&oacute;n: </b> Al firmar, el cliente autoriza a <b>'.$row1['confi_razon_social'].'</b> para realizar las intervenciones necesarias para reparar el/los dispositivo(s) entregado(s). <br>
        <b> 3. Tiempo de Retiro: </b> Despu&eacute;s de que <b>'.$row1['confi_razon_social'].'</b> informe al cliente sobre el estado del/los dispositivo(s), el cliente tiene 60 d&iacute;as calendario para recogerlo(s), pasado este tiempo, no nos hacemos responsables por su conservaci&oacute;n o estado.
        
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
