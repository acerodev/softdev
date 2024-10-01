<?php
session_start();
    require_once("../../model/modelo_conexion.php");
    require_once("../../model/modelo_rol.php");
    $rol = new Modelo_Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION['S_ROL'],24);// EL 9 ES MENU GASTOS
    //var_dump($datos);
     if (isset($_SESSION['S_IDUSUARIO']))  {
  
        if(is_array($datos) and count($datos)>0){
?>
    <script src="../js/reporteproducto.js?rev=<?php echo time(); ?>"></script>
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">


    		</div><!-- /.row -->
    	</div><!-- /.container-fluid -->
    </div>

    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12">

    				<div class="card">
    					<div class="card-header">
    						<h6 class="card-title" style="text-align:center"><b>Reporte Utilidad por productos y ventas</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
    						<div class="row">

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_utilidad" class="display compact">
    									<thead style="background:#343A40; color:white ;width: 100%" class="small text left">
    										<!--	<tr>
										                      			<th style="background:white;"></th>
										                      			<th style="background:white;"></th>
										                      			<th style="background:white;"></th>
										                      			<th style="background:green;"></th>
										                      			<th style="background:red;"></th>
										                      			<th style="background:white;"></th>
										                      		</tr>-->
    										<tr>

    											<th>Producto</th>
    											<th>Cant. Vendida</th>
    											<th>P. Venta</th>
    											<th>P. Compra</th>
    											<th>Utilidad Prod.</th>
    											<th>Utilidad Ventas</th>
    										</tr>
    									</thead>
										<tbody class="small text left">
    									</tbody>
    									<tfoot>
    										<tr>
    											<th></th>
    											<th></th>
    											<th></th>
    											<th></th>
    											<th></th>
    											<th></th>
    										</tr>
    									</tfoot>
    								</table>
    							</div>
    						</div>
    					</div>
    				</div>

    			</div>
    		</div>
    	</div>
    </section>



    <script>
    	//para el diseño del combo
    	$(document).ready(function() {
    		$('.js-example-basic-single').select2();
    	});
    	Listar_Reporte_Utilidad();
    </script>

<?php
    }else{
        header("Location:".conexionBD::ruta()."view/404/mant_error.php");
    }
    }else{
        header("Location:".conexionBD::ruta()."view/404/mant_error.php");
    }
?>