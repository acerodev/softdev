<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//$mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 50]]);
$query = "SELECT
            pd.imei,
            p.producto_nombre 
            FROM
            producto_detalle pd
            INNER JOIN producto p ON pd.producto_id = p.producto_id
            WHERE pd.imei =  '".$_GET['codigo']."'";

$resultado = $mysqli->query($query);
$html = '
<style>
@page {
    margin: 3mm;
    margin-header: 0mm;
    margin-footer: 0mm;
    odd-footer-name: html_myfooter1;
}

table {
    width: 100%; /* Opcional: para ocupar todo el ancho disponible */
    text-align: center; /* Para centrar el contenido dentro de la tabla */
}
</style>';

while ($row1 = $resultado->fetch_assoc()) {

    $html .= '
    <table>
        <thead>
            <tr>
                <td><b>'.$row1['producto_nombre'].'</b></td>  
            </tr>
            <tr>
                <td>
                    <barcode code="'.$row1['imei'].'" type="QR" class="barcode" size="0.6" disableborder="1" />
                </td>
            </tr>
            <tr>
                <td  style="display: inline-block;margin: 0px;padding: 0px;font-size:11px; font-weight:normal;">Imei '.$row1['imei'].'</td>  
            </tr>
        </thead>
    </table>';

}

//$css = file_get_contents('css/style_rece.css'); CODABAR o QR
//$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
