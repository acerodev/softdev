 /********************************************************************
 		BUSCAR EQUIPO
 ********************************************************************/

var tbl_buscar_equipo;
 function Buscar_Equipo(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var dni = document.getElementById('text_documento').value;

	tbl_buscar_equipo = $("#tabla_buscar_equipo").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 't',
		"ajax" : {
			"url": "../controller/buscarequipo/controlador_buscar_equipo.php",
			type: 'POST',
			data:{
				dni:dni
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "cliente_dni"},
		{"data": "cliente_nombres"},
		{"data": "rece_equipo"},
		{"data": "rece_concepto"},
		{"data": "rece_fregistro"},
		{"data": "rece_estado",
			render: function(data,type,row){
				if (data=="EN REPARACION") {
					//return "<center>"+'<span class="badge badge-success">POR RECOGER</span>';+"</center>"
					return "<center>"+"<span class='badge badge-warning'>"+data+"</span>";+"</center>"
						
				} else if (data=="REPARADO") {
					//return "<center>"+'<span class="badge badge-success">POR RECOGER</span>';+"</center>"
					return "<center>"+"<span class='badge badge-success'>"+data+"</span>";+"</center>"
						
				} else if (data=="NO REPARADO") {
					//return "<center>"+'<span class="badge badge-success">POR RECOGER</span>';+"</center>"
					return "<center>"+"<span class='badge badge-danger'>"+data+"</span>";+"</center>"
						
				}else{
					//return "<center>"+'<span class="badge badge-danger">POR ENTREGAR</span>';+"</center>"
					return "<center>"+"<span class='badge badge-success'>"+data+"</span>";+"</center>"
				}
			
				
				
			}
		},
		

		],
		"language":idioma_espanol,
		select:true
	});
 }	


  /********************************************************************
 		BUSCAR  VENTAS 
 ********************************************************************/

var tbl_buscar_ventas;
function Buscar_ventas(){//enviarlo al scrip en MANTENIMIENTO ROL
	var dni = document.getElementById('text_documento').value;

	tbl_buscar_ventas = $("#tabla_buscar_ventas").DataTable({		
	   "responsive" :true,
	   "ordering" :false,
	   "bLengthChange" : true,
	   "searching" : {"regex" : false},
	   "lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
	   "pageLength" : 10,
	   "destroy" :true,
	   "async" : false,
	   "bprocessing": true,
	   "dom": 't',
	   "ajax" : {
		   "url": "../controller/buscarequipo/controlador_buscar_ventas.php",
		   type: 'POST',
		   data:{
			   dni:dni
		   }

	   },
	   "columns":[
	   //todos los datos del procedimiento almacenado
	   {"data": "comprobante"},
	   {"data": "venta_fregistro"},
	   {"data": "venta_total"},
	   {"data": "equipo"},
	   {
		"data": "venta_estado",
		render: function (data, type, row) {
			if (data === "REGISTRADA") {
				return "<center>" + '<span class="badge badge-warning">REGISTRADA</span>'; +"</center>"

			} if (data === "PAGADA") {
				return "<center>" + '<span class="badge badge-success">PAGADA</span>'; +"</center>"

			} else {
				return "<center>" + '<span class="badge badge-danger">ANULADA</span>'; +"</center>"
			}

		}
	},
	   

	   ],
	   "language":idioma_espanol,
	   select:true
   });
}	


