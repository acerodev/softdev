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
            recepcion.rece_fentrega, 
            recepcion.marca_id, 
            marca.marca_descripcion,
            recepcion.enciende,
            recepcion.tactil
            
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


            where recepcion.rece_id =  '".$_GET['codigo']."'";

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
                    <th width="90%"  style="color:black;  font-size: 11px;  text-align: center;border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;">
                        <b>'.$row1['confi_razon_social'].' </b> <br> 
                        R.U.C '.$row1['confi_ruc'].'<br> 
                        ' . $row1['confi_direccion'] . '<br> 
                        Tel. :' . $row1['confi_telefono'] . ' -   Movil. : ' . $row1['confi_celular'] . '
                    
                    </th>
           
                    <th width="10%" style="color:black;  font-size: 10px;  text-align: right; border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;"> 
                        FECHA: &nbsp; '.$row1['rece_fregistro'].'
                    
                    </th>
                </tr>
          
            
            </thead>
        </table>
       
     

        <table>
        <thead>
            <tr>
                <th colspan="7"  style="color:white; background:#1e81b0; font-size: 12px; text-align: left;">
                    Datos del Cliente: &nbsp; 
                   
                </th>
        
            </tr>
            <tr>
                <th colspan="7"  style="color:black;   font-size: 11px; text-align: left;">
                    Nombre&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['cliente_nombres'].' <br> 
                    Doc. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['cliente_dni'].' <br> 
                    Cel. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['cliente_celular'].' <br> <br> <br> 
                
                </th>
             </tr>
             <tr>
                <th colspan="7"  style="color:white; background:#1e81b0; font-size: 12px; text-align: left;">
                    Datos del Equipo: &nbsp; 
                   
                </th>
        
            </tr>
            <tr>
                <th colspan="7"  style="color:black;  font-size: 11px; text-align: left;">
                    Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['rece_equipo'].' <br> 
                    Caracteristicas &nbsp;: &nbsp; &nbsp; '.$row1['rece_caracteristicas'].' <br> 
                    Concepto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['motivo'].' <br> 
                    Accesorios &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['rece_accesorios'].' <br> <br> <br> 
                
                </th>
             </tr>
            
           
            
           
        </thead>
        <tbody>';
    $query2 = "SELECT
	
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.rece_equipo, 
	recepcion.rece_adelanto, 
	recepcion.rece_debe, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	DATE_FORMAT(servicio.servicio_fregistro, '%d/%m/%Y') as servicio_fregistro,
	servicio.servicio_entrega,
    servicio.servicio_comentario,
    servicio.servicio_obser
FROM
	configuracion,
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id

	where servicio.rece_id =  '".$_GET['codigo']."'";
   

   
    $resultado2 = $mysqli->query($query2);
    while ($row2 = $resultado2->fetch_assoc()) {
       

        $html .= ' <tr>
                        <th colspan="7"  style="color:white; background:#1e81b0; font-size: 12px; text-align: left;">
                        Diagnostico del Equipo: &nbsp; 
                            
                        </th>
                     </tr>
                
                <tr>
                <th colspan="7"  style="color:black;  font-size: 11px; text-align: left;">
                    Falla  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; &nbsp; '.$row1['rece_concepto'].' <br> 
                    Solucion  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: &nbsp; &nbsp; '.$row2['servicio_comentario'].'  <br> 
                    Observacion &nbsp;: &nbsp; &nbsp; '.$row2['servicio_obser'].'  <br> 
                    Tecnico &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: &nbsp; &nbsp; '.$row2['servicio_responsable'].'  <br> <br> <br> 
                
                </th>
             </tr>
             <tr>
                        <th colspan="7"  style="color:white; background:#1e81b0; font-size: 12px; text-align: left;">
                        Test del Equipo: &nbsp; 
                            
                        </th>
              </tr>
              <tr>
              <th colspan="7"  style="color:black;  font-size: 11px; text-align: left;">
                   <br> 
                    Enciende:';
                    if ($row1['enciende'] == "Si") {

                    $html .= '
                    
                    <label class="form-check-label">Si</label>
                    <input class="form-check-input" type="checkbox" name="text_enciende_no"  checked="true">
                    <label class="form-check-label">No</label>
                    <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                    ';
                } else { 
                    $html .= '
             
                    <label class="form-check-label">Si</label>
                    <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                    <label class="form-check-label">No</label>
                    <input class="form-check-input" type="checkbox" name="text_enciende_no"  checked="true">';

                  }

                  
                   
                  $html .= '  
                  
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tactil:';
                  if ($row1['tactil'] == "Si") {

                  $html .= '
                  
                  <label class="form-check-label">Si</label>
                  <input class="form-check-input" type="checkbox" name="text_enciende_no"  checked="true">
                  <label class="form-check-label">No</label>
                  <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                  ';
              } else { 
                  $html .= '
           
                  <label class="form-check-label">Si</label>
                  <input class="form-check-input" type="checkbox" name="text_enciende_no"  >
                  <label class="form-check-label">No</label>
                  <input class="form-check-input" type="checkbox" name="text_enciende_no"  checked="true">';

                }

                
                 
                $html .= ' 
              </th>
           </tr>
           ';
    }


    $html .= '
    <tr>
				
    </tr>
       <tr>
          <td  colspan="1" rowspan="5"  style="  border-left:0px; border-bottom:0px; border-right:0px; ">
      
          </td>
          <td colspan="4" style=" border-left:0px; border-bottom:0px; border-right:0px;">Totales:</td>
          <td class="" style="text-align: right; font-size: 9px; "></td>
          <td class="" style="text-align: right; font-size: 9px; "></td>
      
       </tr>
   
               
            </tbody>
          </table>
         
          
        
        </main>
        <footer>
    
        </footer>
      </body>
    </html>';
}




 $css = file_get_contents('css/style_coti.css');
 $mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();