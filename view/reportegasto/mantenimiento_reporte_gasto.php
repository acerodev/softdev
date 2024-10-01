<?php
session_start();
    require_once("../../model/modelo_conexion.php");
    require_once("../../model/modelo_rol.php");
    $rol = new Modelo_Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION['S_ROL'],20);// EL 9 ES MENU GASTOS
    //var_dump($datos);
     if (isset($_SESSION['S_IDUSUARIO']))  {
  
        if(is_array($datos) and count($datos)>0){
?>
    <script src="../js/reportegasto.js?rev=<?php echo time(); ?>"></script>
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
    						<h6 class="card-title" style="text-align:center"><b>Reporte por Mes de los Gastos</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
    						<div class="row">

    							<div class="input-group input-group-sm mb-3 col-lg-6  col-8">
    								<div class="input-group-prepend">
    									<span class="input-group-text">Mes</span>

    								</div>
    								<select class="form-control form-control-sm js-example-basic-single" id="select_mes_gasto" style="width: 60%">
    									<option value="">Seleccione</option>
    									<option value="1">Enero</option><!--iniciar el select 2 en el script -->
    									<option value="2">Febrero</option>
    									<option value="3">Marzo</option>
    									<option value="4">Abril</option>
    									<option value="5">Mayo</option>
    									<option value="6">Junio</option>
    									<option value="7">Julio</option>
    									<option value="8">Agosto</option>
    									<option value="9">Septiembre</option>
    									<option value="10">Octubre</option>
    									<option value="11">Noviembre</option>
    									<option value="12">Diciembre</option>
    								</select>
    							</div>
    							<div class="col-lg-6  col-4">
    								<button class="btn btn-info btn-sm" onclick="Listar_Reporte_Gasto_Mes();validar();"><i class="fas fa-search"></i></button>
    							</div>

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_gasto_mes" class="display compact">
    									<thead style="background:#343A40; color:white"  class="small text left">
    										<tr>
    											<th>Tipo</th>
												<th>Descripcion</th>
    											<th>Monto</th>
    											<th>Responsable</th>
    											<th>Fecha</th>
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
    						<h6 class="card-title" style="text-align:center"><b>Reporte por Año de Gastos</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
    						<div class="row">

    							<div class="input-group input-group-sm mb-3 col-lg-6  col-8">
    								<div class="input-group-prepend">
    									<span class="input-group-text">Año</span>
    								</div>
    								<select class="form-control form-control-sm js-example-basic-single" id="select_anio_gasto" style="width: 60%"> </select>
    							</div>
    							<div class="col-lg-6  col-4">
    								<button class="btn btn-info btn-sm" onclick="Listar_Reporte_Gasto_Anio();validar2();"><i class="fas fa-search"></i></button>
    							</div>

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_gasto_anio" class="display compact">
    									<thead style="background:#343A40; color:white" class="small text left">
    										<tr>
    											<th>Año</th>
    											<th>Mes</th>
    											<th>Cant. Gastos </th>
    											<th>Monto</th>
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
    						<h6 class="card-title" style="text-align:center"><b>Reporte Total Anual</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">

    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_gasto_total_anio" class="display compact">
    									<thead style="background:#343A40; color:white" class="small text left">
    										<tr>
    											<th>Año</th>
    											<th>Total Gastos</th>
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
    	});
    	Listar_Reporte_Gasto_Mes();
    	Listar_Reporte_Gasto_Anio();
    	Listar_Reporte_Gasto_Total_Anio();
    	cargar_SelectAnioGasto();

    	function validar() {
    		let mes = document.getElementById('select_mes_gasto').value;
    		if (mes.length == 0) {
    			return Swal.fire("Mensaje de Advertencia", "Seleccione un Mes", "warning");
    		}

    	}


    	function validar2() {

    		let anio = document.getElementById('select_anio_gasto').value;
    		if (anio.length == 0) {
    			return Swal.fire("Mensaje de Advertencia", "Seleccione un Año", "warning");
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