<?php
session_start();
    require_once("../../model/modelo_conexion.php");
    require_once("../../model/modelo_rol.php");
    $rol = new Modelo_Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION['S_ROL'],19);// EL 9 ES MENU GASTOS
    //var_dump($datos);
     if (isset($_SESSION['S_IDUSUARIO']))  {
  
        if(is_array($datos) and count($datos)>0){
?>
    <script src="../js/reporteservicio.js?rev=<?php echo time(); ?>"></script>
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">


    		</div><!-- /.row -->
    	</div><!-- /.container-fluid -->
    </div>

    <!-- REPORTE POR FECHAS Y TECNICO -->
    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12">

    				<div class="card">
    					<div class="card-header">
    						<h6 class="card-title" style="text-align:center"><b>Reporte de Reparaciones</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">

    						<div class="row">

    							<div class="col-lg-3">
    								<label for="">Fecha Inicio</label>
    								<input type="date" name="" id="text_finicio" class="form-control  form-control-sm">
    							</div>
    							<div class="col-lg-3">
    								<label for="">Fecha Fin</label>
    								<input type="date" name="" id="text_ffin" class="form-control  form-control-sm">
    							</div>
    							<div class="col-lg-4 col-sm-6">

    								<label form="">Tecnico</label>
    								<select class="form-control form-control-sm js-example-basic-single" id="select_tecnico" style="width: 100%"> </select>
    							</div>
    							<div class="col-2">
    								<label for="">&nbsp;</label><br>
    								<button class="btn btn-info btn-sm" onclick=" validarFiltro();"><i class="fas fa-search"></i></button>

    							</div>

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_servi_fechas_tecni" class="display compact">
    									<thead style="background:#343A40; color:white" class="small text left">
    										<tr>
    											<th>PEDIDO</th>
    											<th>CLIENTE</th>
    											<th>CONCEPTO</th>
    											<th>MONTO</th>
												<th>F. PAGO</th>
    											<th>TECNICO</th>
    											<th>ESTADO</th>
    											<th>FECHA R.</th>
												<th>FECHA F.</th>
												<th>DIAS</th>

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

    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12">

    				<div class="card">
    					<div class="card-header">
    						<h6 class="card-title" style="text-align:center"><b>Reporte por Mes de Servicios</b></h6>
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
    								<select class="form-control form-control-sm js-example-basic-single" id="select_mes_servicio" style="width: 60%">
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
    							<div class="col-lg-6 col-4">
    								<button class="btn btn-info btn-sm" onclick="Listar_Reporte_Servicio_Mes();validar();"><i class="fas fa-search"></i></button>
    							</div>

    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_servicio_mes" class="display compact">
    									<thead style="background:#343A40; color:white" class="small text left">
    										<tr>
    											<th style="width:25%">Cliente</th>
    											<th style="width:30%">Concepto</th>
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
    						<h6 class="card-title" style="text-align:center"><b>Reporte por Año de Servicios</b></h6>
    						<div class="card-tools">
    							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    								<i class="fas fa-minus"></i>
    							</button>

    						</div>
    					</div>
    					<div class="card-body">
    						<div class="row">

    							<div class="input-group input-group-sm mb-3 col-lg-6  col-8 ">
    								<div class="input-group-prepend">
    									<span class="input-group-text">Año</span>
    								</div>
    								<select class="form-control form-control-sm js-example-basic-single" id="select_anio_servicio" style="width: 60%"> </select>
    							</div>
    							<div class="col-lg-6  col-4">
    								<button class="btn btn-info btn-sm" onclick="Listar_Reporte_Servicio_Anio();validar2();"><i class="fas fa-search"></i></button>
    							</div>


    						</div><br>
    						<div class="row">
    							<div class="col-12 table-responsive">
    								<table id="tabla_reporte_servicio_anio" class="display compact">
    									<thead style="background:#343A40; color:white" class="small text left">
    										<tr>
    											<th>Año</th>
    											<th>Mes</th>
    											<th>Cant. Servicios </th>
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















    <script>
    	//para el diseño del combo
    	$(document).ready(function() {
    		$('.js-example-basic-single').select2();
    		fechas();
    		Listar_Reporte_Servicio_Mes();
    		Listar_Reporte_Servicio_Anio();
    		cargar_SelectAnioServicio();
    		cargar_SelectTecnico();
    		Listar_Servicio_fechas_tecnico();
    	});
		

    	function fechas() {

    		var f = new Date();
    		var anio = f.getFullYear();
    		var mes = f.getMonth() + 1;
    		var d = f.getDate();


    		if (d < 10) {
    			d = '0' + d;
    		}
    		if (mes < 10) {
    			mes = '0' + mes;
    		}

    		document.getElementById('text_finicio').value = anio + "-" + mes + "-" + d;
    		document.getElementById('text_ffin').value = anio + "-" + mes + "-" + d;
    	}


    	function validar() {
    		let mes = document.getElementById('select_mes_servicio').value;
    		if (mes.length == 0) {
    			return Swal.fire("Mensaje de Advertencia", "Seleccione un Mes", "warning");
    		}

    	}


    	function validar2() {

    		let anio = document.getElementById('select_anio_servicio').value;
    		if (anio.length == 0) {
    			return Swal.fire("Mensaje de Advertencia", "Seleccione un Año", "warning");
    		}
    	}


    	function validarFiltro() {
    		let teci = document.getElementById('select_tecnico').value;
    		if (teci.length == 0) {
    			return Swal.fire("Mensaje de Advertencia", "Seleccione un Tecnico", "warning");
    		}  else {
				Listar_Servicio_fechas_tecnico();
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