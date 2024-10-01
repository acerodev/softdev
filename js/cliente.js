 /********************************************************************
 		LISTAR CLIENTE CON METODO NORMAL
 ********************************************************************/

var tbl_cliente;
 function Listar_Cliente(){//enviarlo al scrip en MANTENIMIENTO CLIENTE
	tbl_cliente = $("#tabla_cliente").DataTable({
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"dom": 'Blfrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },

		],
		"destroy" :true,
		"async" : false,
		"processing": true,	

		"ajax" : {
			"url": "../controller/cliente/controlador_cliente_listar.php",
			type: 'POST'
		},

		
		"columns":[
		//todos los datos del procedimiento almacenado
		{"defaultContent": ""},//cintador 
		{"data": "cliente_nombres"},
		{"data": "cliente_direccion"},	
		{"data": "cliente_dni"},
		{"data": "cliente_celular"},
		{"data": "cliente_estado",
			render: function(data,type,row){
				if (data==="ACTIVO") {
					return "<center>"+'<span class="badge badge-success">ACTIVO</span>';+"</center>"
				}else{
					return "<center>"+'<span class="badge badge-danger">INACTIVO</span>';+"</center>"
				}
			}
		},
		{"defaultContent": "<center>"+"<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class='fa fa-edit'></i></span>"+"</center>"}


		],
		"language":idioma_espanol,
		select:true
	});
	//contador en cada tabla
	tbl_cliente.on('draw.td',function(){
		var PageInfo = $("#tabla_cliente").DataTable().page.info();
		tbl_cliente.column(0,{page: 'current'}).nodes().each(function(cell,i){
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
 }





 /********************************************************************
 		ABRIR MODAL REGISTRAR CLIENTE
 ********************************************************************/
 function AbrirModalRegistroCliente(){
 	//para que no se nos salga del modal haciendo click a los costados
 	$("#modal_registro_cliente").modal({backdrop:'static', keyboard: false});	
 	$("#modal_registro_cliente").modal('show');//abrimos el modal

 	LimpiarModalCliente();//limpiar texbox cada que demos en nuevo
 	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
 }





 /********************************************************************
 		ABRIR MODAL EDITAR CLIENTE
 ********************************************************************/
 $('#tabla_cliente').on('click', '.editar', function() {//class foto tiene que ir en el boton
	var data = tbl_cliente.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_cliente.row(this).child.isShown()) {
		var data = tbl_cliente.row(this).data();//para celular y usas el responsive datatable
	}
	
		$("#modal_editar_cliente").modal({backdrop:'static', keyboard: false});	
		$("#modal_editar_cliente").modal('show');//abrimos el modal
		//LimpiarModalUsuario();
		//mandamos parametros a los texbox
		//document.getElementById('idrol').value=data[0];
		document.getElementById('idcliente').value=data.cliente_id;//id del procedure
		document.getElementById('text_nombre_editar').value=data.cliente_nombres;
		document.getElementById('text_dni_editar').value=data.cliente_dni;
		document.getElementById('text_celular_editar').value=data.cliente_celular;//enviamos el nombre del usu al modal
		document.getElementById('text_direccion_editar').value=data.cliente_direccion;
		document.getElementById('text_ape_p_editar').value=data.cliente_ape_p;
		document.getElementById('text_ape_m_editar').value=data.cliente_ape_m; 
		document.getElementById('text_correo_editar').value=data.cliente_correo; 
		//console.log(data.rol_id);//para enviar el dato  en console
		$("#select_estado_cliente_editar").select2().val(data.cliente_estado).trigger('change.select2');
		$("#select_tipo_doc_editar").select2().val(data.cliente_tipo_doc).trigger('change.select2');
 });






 /********************************************************************
 		VALIDAR TEXBOX CLIENTE
 ********************************************************************/
 function ValidarCamposCliente(nombre,dni,celular, tipo_doc){
 	Boolean(document.getElementById(nombre).value.length>0) ? $("#"+nombre).removeClass("is-invalid").addClass("is-valid") : $("#"+nombre).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(dni).value.length>0) ? $("#"+dni).removeClass("is-invalid").addClass("is-valid") : $("#"+dni).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(celular).value.length>0) ? $("#"+celular).removeClass("is-invalid").addClass("is-valid") : $("#"+celular).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(tipo_doc).value.length>0) ? $("#"+tipo_doc).removeClass("is-invalid").addClass("is-valid") : $("#"+tipo_doc).removeClass("is-valid").addClass("is-invalid");
 }





 /********************************************************************
 		LIMPIAR TEXBOX CLIENTE
 ********************************************************************/
 function LimpiarModalCliente(){
	document.getElementById('text_nombre').value="";
	document.getElementById('text_dni').value="";
	document.getElementById('text_celular').value="";
	document.getElementById('text_direccion').value="";
	document.getElementById('text_ape_p').value="";
	document.getElementById('text_ape_m').value="";
	document.getElementById('text_correo').value="";
	document.getElementById('select_tipo_doc').value="";
 }







 /********************************************************************
 		REGISTRAR CLIENTE
 ********************************************************************/
 function RegistrarCliente(){
 	let nombre = document.getElementById('text_nombre').value;
 	let dni = document.getElementById('text_dni').value;
 	let cel = document.getElementById('text_celular').value;
 	let direccion = document.getElementById('text_direccion').value;
	let apellidop = document.getElementById('text_ape_p').value;
	let apellidom = document.getElementById('text_ape_m').value;
	let correo = document.getElementById('text_correo').value;
	let tipo_doc = document.getElementById('select_tipo_doc').value;
 	if (nombre.length ==0 || dni.length ==0 || cel.length ==0  ) {
 		ValidarCamposCliente("text_nombre","text_dni","text_celular", "select_tipo_doc");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}
 
	$.ajax({
 		url:'../controller/cliente/controlador_cliente_registar.php',
 		type: 'POST',
 		data:{
 			nombre: nombre,//le enviamos los campos al controlador
 			dni: dni,
 			cel: cel,			
 			direccion: direccion,
			apellidop: apellidop,
			apellidom: apellidom,
			correo:correo,
			tipo_doc:tipo_doc
 		}
 	}).done(function(resp){
 		if (resp>0) {
 			if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2
 				Swal.fire("Mensaje de Confirmacion","Cliente Registrado","success").then((value)=>{
	 					
	 					$("#modal_registro_cliente").modal('hide');//abrimos el modal

	 					tbl_cliente.ajax.reload();//recargar dataTable
	 					//TraerNotificaciones();
	 				});	
 			}else{
 				Swal.fire("Mensaje de Advertencia","El Cliente ya se encuentra registrado","warning");
 			}
	 				 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede registrar el Cliente","error");
	 		}
 	})	 
 }







 /********************************************************************
 		MODIFICAR CLIENTE
 ********************************************************************/
 function ModificarCliente(){//enviamos los datos del ajax al controlador y al onclick del boton editar
 	let id = document.getElementById('idcliente').value;
 	let nombre = document.getElementById('text_nombre_editar').value;
 	let dni = document.getElementById('text_dni_editar').value;
 	let cel = document.getElementById('text_celular_editar').value;
 	let estado = document.getElementById('select_estado_cliente_editar').value;
 	let direccion = document.getElementById('text_direccion_editar').value;
	let apellidop = document.getElementById('text_ape_p_editar').value;
	let apellidom = document.getElementById('text_ape_m_editar').value;
	let correo = document.getElementById('text_correo_editar').value;
	let tipo_doc = document.getElementById('select_tipo_doc_editar').value;

 	if (nombre.length ==0 || dni.length ==0 || cel.length ==0  ) {
 		ValidarCamposCliente("text_nombre_editar","text_dni_editar","text_celular_editar");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}

 	$.ajax({
 		url:'../controller/cliente/controlador_modificar_cliente.php',
 		type: 'POST',
 		data:{
 			id: id,//le enviamos los campos al controlador
 			nombre: nombre,
 			dni: dni,
 			cel: cel,			
 			estado: estado,
 			direccion: direccion,
			apellidop:apellidop,
			apellidom:apellidom,
			correo:correo,
			tipo_doc:tipo_doc	
 		}
 	}).done(function(resp){
 	 	if (resp>0) {
 			if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2
 					//ValidarCamposCliente("text_nombre_editar","text_dni_editar","text_celular_editar");
	 				LimpiarModalCliente();
 				Swal.fire("Mensaje de Confirmacion","Cliente Actualizado","success").then((value)=>{					
	 					$("#modal_editar_cliente").modal('hide');//abrimos el modal
	 					tbl_cliente.ajax.reload();//recargar dataTable
	 					//TraerNotificaciones();
	 				});	
 			}else{
 				Swal.fire("Mensaje de Advertencia","El Cliente ya se encuentra registrado","warning");

 			}
	 				 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede registrar el Cliente","error");
	 		}
 	})
 }






