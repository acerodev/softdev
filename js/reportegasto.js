 /********************************************************************
 		REPORTE GASTOS  POR MES
 ********************************************************************/
 var tbl_gasto_Mes;
 function Listar_Reporte_Gasto_Mes(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var mes = document.getElementById('select_mes_gasto').value;
	tbl_gasto_Mes = $("#tabla_reporte_gasto_mes").DataTable({
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"processing": true,
		"dom": 'Blfrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },		
		],
		"ajax" : {
			"url": "../controller/reportegasto/controlador_gasto_listar_mes.php",
			type: 'POST',
			data:{
				mes:mes
			}
		},
		
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "tipo_mov"},
		{"data": "gastos_descripcion"},
		{"data": "gastos_monto"},
		{"data": "gastos_responsable"},
		{"data": "gastos_fregistro"}
		],
		"language":idioma_espanol,
		select:true
		
	});
 }





 /********************************************************************
 		REPORTE GASTOS  POR AÑO
 ********************************************************************/
var tbl_gasto_anio;
 function Listar_Reporte_Gasto_Anio(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var anio = document.getElementById('select_anio_gasto').value;
 	//var ffin = document.getElementById('text_ffin').value;
	tbl_gasto_anio = $("#tabla_reporte_gasto_anio").DataTable({		
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
			"url": "../controller/reportegasto/controlador_reporte_gasto_anio.php",
			type: 'POST',
			data:{
				anio:anio
			}
		},
		"columns":[
		//todos los datos del procedimiento almacenad
		{"data": "ano"},
		{"data": "mesnombre"},
		{"data": "cant_gastos"},		
		{"data": "gasto"},
		],
		"language":idioma_espanol,
		select:true
	});
 }	





 /********************************************************************
 		CARGAR AÑOS QUE SE ENCUENTRAN EN LA BASE - GASTOS
 ********************************************************************/
 function cargar_SelectAnioGasto(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/reportegasto/controlador_cargar_anio.php',
 		type: 'POST'
 	}).done(function(resp){

 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option >"+data[i][0]+"</option>";
 			}
 			document.getElementById('select_anio_gasto').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_anio_gasto').innerHTML = llenardata;


 		}
 	})
 }










 /********************************************************************
 		REPORTE GASTOS TOTAL POR AÑO
 ********************************************************************/
 var tbl_reportegasto_total_anio;
 function Listar_Reporte_Gasto_Total_Anio(){//enviarlo al scrip en MANTENIMIENTO ROL
	tbl_reportegasto_total_anio = $("#tabla_reporte_gasto_total_anio").DataTable({		
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
		"rowCallback": function( row, data ) {
		    if ( data.ano == "2022" ) {
		      
		    /* $('td', row).css({
                           'background-color':'#ff5252',
                           'color':'white',
                           'border-style':'solid',
                           'border-color':'#bdbdbd' 
                       });*/
		    }
		  },
		
						   
		  
		"ajax" : {
			"url": "../controller/reportegasto/controlador_reportegasto_total_anio.php",
			type: 'POST'
		},		
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "ano"},
		{"data": "total_gasto_ano"},
		],
		"language":idioma_espanol,
		select:true
	});
 }	













