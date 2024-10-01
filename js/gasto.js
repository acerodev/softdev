 /********************************************************************
 		LISTAR GASTOs CON METODO NORMAL
 ********************************************************************/
var tbl_gasto;
function Listar_Gasto(){//enviarlo al scrip en MANTENIMIENTO GASTO
	tbl_gasto = $("#tabla_gasto").DataTable({
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"processing": true,
		"ajax" : {
			"url": "../controller/gasto/controlador_gasto_listar.php",
			type: 'POST'
		},
		"dom": 'Blfrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },			
		],
		"columns":[
		//todos los datos del procedimiento almacenado
		{"defaultContent": ""},//cintador 
		{"data": "tipo_mov",
		render: function(data,type,row){
			if (data==="INGRESO") {		
				return  '<span class="badge badge-info">INGRESO</span>';
			}else{
				return  '<span class="badge badge-warning">EGRESO</span>';
			}
		}
		
		
		},
		{"data": "gastos_descripcion"},
		{"data": "gastos_monto"},
		{"data": "gastos_responsable"},
		{"data": "gastos_fregistro"},
		{"data": "gastos_estado",
			render: function(data,type,row){
				if (data==="ACTIVO") {		
					return "<center>"+'<span class="badge badge-success">ACTIVO</span>';+"</center>"
				}else{
					return "<center>"+'<span class="badge badge-danger">INACTIVO</span>';+"</center>"
				}
			}
		},
		//{ "data": "estado_caja" },
		{
			"data": "estado_caja",
			render: function (data, type, row) {
				if (data === "ABIERTO" ) {
					return "<center>" + "<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span>" + "</center>"
				} else {
					return "<center>" + "<span class='  text-secundary px-1'  ><i class= 'fa fa-edit'></i></span>" + "</center>"
				}
			}
		}
		//{"defaultContent": "<center>"+"<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span>"+"</center>"}


		],
		"language":idioma_espanol,
		select:true
	});
	//contador en cada tabla
	tbl_gasto.on('draw.td',function(){
		var PageInfo = $("#tabla_gasto").DataTable().page.info();
		tbl_gasto.column(0,{page: 'current'}).nodes().each(function(cell,i){
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
}




 /********************************************************************
 		ABRIR MODAL REGISTRAR GASTO
 ********************************************************************/
  function AbrirModalRegistroGasto(){//se jala en el boton nuevo
 	//para que no se nos salga del modal haciendo click a los costados
 	$("#modal_registro_gasto").modal({backdrop:'static', keyboard: false});	
 	$("#modal_registro_gasto").modal('show');//abrimos el modal
 	//document.getElementById('text_producto').value="";
 	//LimpiarModalGasto();//limpiar texbox cada que demos en nuevo
 	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
 }





 /********************************************************************
 		ABRIR MODAL EDITAR GASTO
 ********************************************************************/
 $('#tabla_gasto').on('click', '.editar', function() {//class EDITAR tiene que ir en el boton
	var data = tbl_gasto.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_gasto.row(this).child.isShown()) {
		var data = tbl_gasto.row(this).data();//para celular y usas el responsive datatable
	}
		$("#modal_editar_gasto").modal({backdrop:'static', keyboard: false});	
		$("#modal_editar_gasto").modal('show');//abrimos el modal
		//mandamos parametros a los texbox
		//document.getElementById('idrol').value=data[0];
		document.getElementById('idgasto').value=data.gastos_id;//id del procedure
		document.getElementById('text_gasto_editar').value=data.gastos_descripcion;//enviamos el nombre del usu al modal
		document.getElementById('text_monto_editar').value=data.gastos_monto;
		document.getElementById('text_responsable_editar').value=data.gastos_responsable;
		$("#select_estado_gasto_editar").select2().val(data.gastos_estado).trigger('change.select2');
		$("#select_tipo_mov_editar").select2().val(data.tipo_mov).trigger('change.select2');
		//console.log(data.analisis_id);//para enviar el dato  en console
 });






 /********************************************************************
 		REGISTRAR GASTO
 ********************************************************************/
 function RegistrarGasto(){
 	let gasto = document.getElementById('text_gasto').value;
 	let monto = document.getElementById('text_monto').value;
 	let responsable = document.getElementById('text_responsable').value;
	let tipomov = document.getElementById('select_tipo_mov').value;

 	if (gasto.length ==0 || monto.length ==0 || responsable.length ==0 ) {
 		ValidarCamposGasto("text_gasto","text_monto","text_responsable");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}
	 if (tipomov == "Seleccione" ) {
		return Swal.fire("Mensaje de Advertencia","Seleccione un tipo de Movimiento","warning");
	}
 
	$.ajax({
 		url:'../controller/gasto/controlador_gasto_registar.php',
 		type: 'POST',
 		data:{
 			gasto: gasto,//le enviamos los campos al controlador
 			monto: monto,
 			responsable: responsable,
			 tipomov:tipomov

 		}
   }).done(function(resp){
	if (resp>0) {
		//validamos la respuesta del procedure si retorna 1 o 2
			ValidarCamposGasto("text_gasto","text_monto","text_responsable");
			Swal.fire("Mensaje de Confirmacion","Movimiento Registrado","success").then((value)=>{
						$("#modal_registro_gasto").modal('hide');//abrimos el modal
	 					tbl_gasto.ajax.reload();//recargar dataTable
					//TraerNotificaciones();
				}); 
		
							
		}else{
			Swal.fire("Mensaje de Error","No se puede registrar el Movimiento","error");
		}
	})  
 }





 /********************************************************************
 		VALIDAR TEXBOX GASTO
 ********************************************************************/
 function ValidarCamposGasto(gasto,monto,responsable){
 	Boolean(document.getElementById(gasto).value.length>0) ? $("#"+gasto).removeClass("is-invalid").addClass("is-valid") : $("#"+gasto).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(monto).value.length>0) ? $("#"+monto).removeClass("is-invalid").addClass("is-valid") : $("#"+monto).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(responsable).value.length>0) ? $("#"+responsable).removeClass("is-invalid").addClass("is-valid") : $("#"+responsable).removeClass("is-valid").addClass("is-invalid");
  
 }





 /********************************************************************
 		LIMPIAR TEXBOX GASTO
 ********************************************************************/ 
 function LimpiarModalGasto(){
	document.getElementById('text_gasto').value="";
	document.getElementById('text_monto').value="";
	document.getElementById('text_responsable').value="";
	//$("#select_marca").select2().val("").trigger('change.select2');

 }






 /********************************************************************
 	 MODIFICAR	GASTO
 ********************************************************************/ 
 function ModificarGasto(){//enviamos los datos del ajax al controlador y al onclick del boton editar
 	let id = document.getElementById('idgasto').value;
 	let gasto = document.getElementById('text_gasto_editar').value;
 	let monto = document.getElementById('text_monto_editar').value;
 	let responsable = document.getElementById('text_responsable_editar').value;
 	let estado = document.getElementById('select_estado_gasto_editar').value;
	 let tipomov = document.getElementById('select_tipo_mov_editar').value;


 	if (gasto.length ==0 || monto.length ==0 || responsable.length ==0 ) {
 		ValidarCamposGasto("text_gasto_editar","text_monto_editar","text_responsable_editar");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}

	 if (tipomov == "Seleccione" ) {
		return Swal.fire("Mensaje de Advertencia","Seleccione un tipo de Movimiento","warning");
	}

 	$.ajax({
 		url:'../controller/gasto/controlador_modificar_gasto.php',
 		type: 'POST',
 		data:{
 			id: id,//le enviamos los campos al controlador
 			gasto: gasto,//le enviamos los campos al controlador
 			monto: monto,
 			responsable: responsable,
 			estado: estado,
			 tipomov:tipomov	
 		}
 	}).done(function(resp){
 	 	if (resp>0) {
				//validamos la respuesta del procedure si retorna 1 o 2
				LimpiarModalGasto();
				Swal.fire("Mensaje de Confirmacion","Movimiento Actualizado","success").then((value)=>{					
						$("#modal_editar_gasto").modal('hide');//abrimos el modal
						tbl_gasto.ajax.reload();//recargar dataTabl
							//TraerNotificaciones();
						}); 
				
									
				}else{
					Swal.fire("Mensaje de Error","No se puede registrar el Movimiento","error");
				}
 	})
 }





/**********************************************************************
        LISTAR ESTADO DE LA CAJA Y VALIDAR PARA HACER UN GASTO
***********************************************************************/

function Traer_estado_caja() {

    $.ajax({
        url: '../controller/caja/controlador_traer_datos_ventas.php',
        type: 'POST'

    }).done(function (resp) {
        //console.log(resp);
        let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

        if (data.length > 0) {
			//enviamos el estado de la caja al label
           document.getElementById('text_estado').innerHTML = data[0][5];


			if (data[0][5] == 'VIGENTE') {
				//HABILITAMOS EL BOTON SI LA CAJA YA ESTA APERTURADA
				//Swal.fire("Mensaje de Confirmacion","Caja Aperturada","success");
				$('#textnuevogasto').prop('hidden', false);//boton nueva venta
			}else {
				//QUITAMOS EL BOTON SI LA CAJA NO ESTA APERTURADA
				Swal.fire("Mensaje de Error","Tienes que Aperturar una caja","error");
				$('#textnuevogasto').prop('hidden', true);// quitamos el boton modificar 
			}

		

        }
    })
}