 /********************************************************************
 		REPORTE SERVICIOS  POR MES
 ********************************************************************/

var tbl_servicio_mes;
 function Listar_Reporte_Servicio_Mes(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var mes = document.getElementById('select_mes_servicio').value;

	tbl_servicio_mes = $("#tabla_reporte_servicio_mes").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Blrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },
			/*{
				"extend":    'pdfHtml5',
				"text":      '<i class="fas fa-file-pdf"></i> ',
				"titleAttr": 'Exportar a Pdf',
				"download": 'open',
				'className': 'btn btn-sm btn-success'
			}*/
			
		],
		"ajax" : {
			"url": "../controller/reporteservicio/controlador_reporte_servicio_mes.php",
			type: 'POST',
			data:{
				mes:mes
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "cliente_nombres"},
		{"data": "concepto"},
		{"data": "servicio_monto"},
		{"data": "servicio_responsable"},
		{"data": "servicio_fregistro"},
		

		],
		"language":idioma_espanol,
		select:true
	});
 }	







 /********************************************************************
 		LISTAR SERVICIOS  POR AÑO
 ********************************************************************/

var tbl_servicio_anio
 function Listar_Reporte_Servicio_Anio(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var anio = document.getElementById('select_anio_servicio').value;
	tbl_servicio_anio = $("#tabla_reporte_servicio_anio").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Bt',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },
			/*{
				"extend":    'pdfHtml5',
				"text":      '<i class="fas fa-file-pdf"></i> ',
				"titleAttr": 'Exportar a Pdf',
				"download": 'open',
				'className': 'btn btn-sm btn-success'
			}*/
			
		],
		"ajax" : {
			"url": "../controller/reporteservicio/controlador_reporte_servicio_anio.php",
			type: 'POST',
			data:{
				anio:anio
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "ano"},
		{"data": "mesnombre"},
		{"data": "cant_servicio"},
		{"data": "monto_servicio"},

		],
		"language":idioma_espanol,
		select:true
	});
 }	


 var tbl_servicio_fechas_tecni;
 function Listar_Servicio_fechas_tecnico() {//enviarlo al scrip en MANTENIMIENTO ROL
	 var finicio = document.getElementById('text_finicio').value;
	 var ffin = document.getElementById('text_ffin').value;
	 var tecnico = document.getElementById('select_tecnico').value;

	 //console.log(tecnico);

	 tbl_servicio_fechas_tecni = $("#tabla_reporte_servi_fechas_tecni").DataTable({
		 "responsive": true,
		 "ordering": false,
		 "bLengthChange": true,
		 "searching": { "regex": false },
		 "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		 "pageLength": 10,
		 "destroy": true,
		 "async": false,
		 "bprocessing": true,
		 "dom": 'Blfrtip',
		 "buttons": [
			 {
				 "extend": 'excelHtml5',
				 "text": '<i class="fa fa-file-excel"></i>',
				 "titleAttr": 'Exportar a Excel'
			 },
			 {
				 "extend":    'pdfHtml5',
				 "text":      '<i class="fas fa-file-pdf"></i> ',
				 "titleAttr": 'Exportar a Pdf',
				 "download": 'open',
				 'className': 'btn btn-sm btn-success'
			 }
 
		 ],
		 "ajax": {
			 "url": "../controller/reporteservicio/controlador_Listar_servicio_fechas_tecnico.php",
			 type: 'POST',
			 data: {
				 finicio: finicio,
				 ffin: ffin,
				 tecnico: tecnico
			 }
 
		 },
		 "columns": [
			 //todos los datos del procedimiento almacenado
			 // { "defaultContent": "" },//cintador 
			 { "data": "r_codig" },
			 { "data": "cliente_nombres" },
			 { "data": "servicio_concepto" },
			 { "data": "servicio_monto" },
			//  { "data": "precio_compr" },
			 { "data": "fpago_descripcion" },
			//  { "data": "iva" },
			//  { "data": "comision" },
			//  { "data": "util" },
			 { "data": "servicio_responsable" },
			 { "data": "servicio_entrega" },
			 { "data": "rece_fregistro" },
			 { "data": "servicio_fregistro" },
			 { "data": "dias_diferencia" },
			
 
		 ],
		 "language": idioma_espanol,
		 select: true
	 });
	 //contador en cada tabla
	 // tbl_servicio.on('draw.td', function () {
	 // 	var PageInfo = $("#tabla_servicio").DataTable().page.info();
	 // 	tbl_servicio.column(0, { page: 'current' }).nodes().each(function (cell, i) {
	 // 		cell.innerHTML = i + 1 + PageInfo.start;
	 // 	});
	 // });
 }






 /********************************************************************
 		CARGAR AÑOS QUE SE ENCUENTRAN EN LA BASE - SERVICIO
 ********************************************************************/
 function cargar_SelectAnioServicio(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/reporteservicio/controlador_cargar_anio_servicio.php',
 		type: 'POST'
 	}).done(function(resp){

 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option >"+data[i][0]+"</option>";
 			}
 			document.getElementById('select_anio_servicio').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_anio_servicio').innerHTML = llenardata;


 		}
 	})
 }


 /********************************************************************
	  CARGAR CLIENTES EN COMBO
********************************************************************/
function cargar_SelectTecnico() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/recepcion/controlador_cargar_select_tecnicos.php',
		type: 'POST'
	}).done(function (resp) {
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option value=''>Seleccione</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
			}
			document.getElementById('select_tecnico').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			//document.getElementById('select_tecnic_editar').innerHTML = llenardata;
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_tecnico').innerHTML = llenardata;
			//document.getElementById('select_tecnic_editar').innerHTML = llenardata;

		}
	})
}