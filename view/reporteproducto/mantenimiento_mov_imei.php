<?php
session_start();
    require_once("../../model/modelo_conexion.php");
    require_once("../../model/modelo_rol.php");
    $rol = new Modelo_Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION['S_ROL'],26);// EL 9 ES MENU GASTOS
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
    						<h6 class="card-title" style="text-align:center"><b>Movimientos Imei</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
    						<div class="row">
    							<div class="col-7">
    								<label for="">Imei</label>
    								<input type="text" name="text_buscar_imei" class="form-control form-control-sm" id="text_buscar_imei" placeholder="Imei">
    							</div>

    							<div class="col-2">
    								<label for="">&nbsp;</label><br>
    								<button class="btn btn-info btn-sm" onclick="llamarKardex();"><i class="fas fa-search"></i></button>

    							</div>

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_mov_imei" class="display compact" style="width: 100%">
                                    <thead style="background:#343A40; color:white ;width: 100%" class="small text left">
    										<tr>
                                                <th>Tipo</th>
    											<th>Fecha</th>
    											<th>Cantidad</th>
    											<th>Usuario</th>
    											<th>Comprobante</th>
    										
    										</tr>
    										
    									</thead>
										<tbody class="small text left">
    									</tbody>
    								</table>
    							</div>
    						</div>
    					</div>
    				</div>

    			</div>
    		</div>
    	</div>
    </section>


	<section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12">

    				<div class="card">
    					<div class="card-header">
    						<h6 class="card-title" style="text-align:center"><b>Rte. Compras Equipos</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
						<div class="row">
    							

    							<div class="col-2">
    								<label for="">&nbsp;</label><br>
    								<button class="btn btn-info btn-sm" onclick="Listar_Rte_Compras_imei();"><i class="fas fa-search"></i>Generar</button>

    							</div>

    						</div><br>
    						
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_compras_imei" class="display compact" style="width: 100%">
                                    <thead style="background:#343A40; color:white ;width: 100%" class="small text left">
    										<tr>
                                                <th>Fecha</th>
    											<th>Articulo</th>
    											<th>Imei</th>
    											<th>Proveedor</th>
    											<th>P. Compra</th>
    										
    										</tr>
    										
    									</thead>
										<tbody class="small text left">
    									</tbody>
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
            Listar_Movimientos_imei();

    	});
    

    	function llamarKardex() {
            Listar_Movimientos_imei();
    		validar();
    	}



    	function validar() {
    		let imei = document.getElementById('text_buscar_imei').value;
    		if (imei == "") {
    			return Swal.fire("Mensaje de Advertencia", "INGRESE UN IMEI", "warning");
    		}
    	}
    </script>

<?php
    }else{
        header("Location:".conexionBD::ruta()."view/404/mant_error.php");
    }
    }else{
        header("Location:".conexionBD::ruta()."view/404/mant_error.php");
    }
?>