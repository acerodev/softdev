/********************************************************************
		   LISTAR VENTA METODO NORMAL
********************************************************************/

var tbl_venta;
function Listar_Venta() {//enviarlo al scrip en MANTENIMIENTO ROL
	var finicio = document.getElementById('text_finicio').value;
	var ffin = document.getElementById('text_ffin').value;
	var idusuario_ventas = document.getElementById('text_Idprincipal').value;
	tbl_venta = $("#tabla_venta").DataTable({
		"responsive": true,
		"ordering": false,
		"bLengthChange": true,
		"searching": { "regex": false },
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"pageLength": 10,
		"destroy": true,
		"async": false,
		"processing": true,
		"dom": 'Blfrtip',
		"buttons": [
			{
				"extend": 'excelHtml5',
				"title": 'Reporte Venta',
				"exportOptions": {
					'columns': [0, 1, 2, 3, 4, 5, 6, 7]
				},
				"text": '<i class="fa fa-file-excel"></i>',
				"titleAttr": 'Exportar a Excel'
			},

		],
		"ajax": {
			"url": "../controller/venta/controlador_venta_listar.php",
			type: 'POST',
			data: {
				finicio: finicio,
				ffin: ffin,
				idusuario_ventas:idusuario_ventas
			}
		},
		"columns": [
			//todos los datos del procedimiento almacenado
			{ "defaultContent": "" },//cintador 
			{ "data": "cliente_nombres" },
			{ "data": "venta_comprobante" },
			{ "data": "comprobante" },
			{ "data": "venta_total" },
			{ "data": "venta_fregistro" },
			{ "data": "usu_nombre" },
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
			{
				"data": "venta_comprobante",
				render: function (data, type, row) {
					if (data === "BOLETA" || data === "FACTURA") {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'   title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='imprimir text-primary px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span> <span class='abrir_whatsapp text-success px-1' style='cursor:pointer;'   title='enviar comprobante por whatsapp'><i class= 'fab fa-whatsapp'></i></span>" + "</center>"
					} else {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'  title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class=' text-secundary px-1' style='cursor:pointer;'  disabled><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span> <span class='abrir_whatsapp text-success px-1' style='cursor:pointer;'   title='enviar comprobante por whatsapp'><i class= 'fab fa-whatsapp'></i></span>" + "</center>"
					}
				}
			},

			/*{
				"data": "venta_comprobante",
				render: function (data, type, row) {
					if (data === "BOLETA" || data === "FACTURA") {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'   title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='pagar text-success px-1' style='cursor:pointer;' title='Pagar la venta total'><i class= 'fa fa-hand-holding-usd'></i></span><span class='imprimir text-primary px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span>" + "</center>"
					} else {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'  title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='pagar text-success px-1' style='cursor:pointer;' title='Pagar la venta total'><i class= 'fa fa-hand-holding-usd'></i></span><span class=' text-secundary px-1' style='cursor:pointer;'  disabled><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span>" + "</center>"
					}
				}
			},*/



		],
		"language": idioma_espanol,
		select: true
	});
	//contador en cada tabla
	tbl_venta.on('draw.td', function () {
		var PageInfo = $("#tabla_venta").DataTable().page.info();
		tbl_venta.column(0, { page: 'current' }).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
}

var tbl_venta;
function Listar_Venta_Admin() {//enviarlo al scrip en MANTENIMIENTO ROL
	var finicio = document.getElementById('text_finicio').value;
	var ffin = document.getElementById('text_ffin').value;
	
	tbl_venta = $("#tabla_venta").DataTable({
		"responsive": true,
		"ordering": false,
		"bLengthChange": true,
		"searching": { "regex": false },
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"pageLength": 10,
		"destroy": true,
		"async": false,
		"processing": true,
		"dom": 'Blfrtip',
		"buttons": [
			{
				"extend": 'excelHtml5',
				"title": 'Reporte Venta',
				"exportOptions": {
					'columns': [0, 1, 2, 3, 4, 5, 6, 7]
				},
				"text": '<i class="fa fa-file-excel"></i>',
				"titleAttr": 'Exportar a Excel'
			},

		],
		"ajax": {
			"url": "../controller/venta/controlador_venta_listar_admin.php",
			type: 'POST',
			data: {
				finicio: finicio,
				ffin: ffin
				
			}
		},
		"columns": [
			//todos los datos del procedimiento almacenado
			{ "defaultContent": "" },//cintador 
			{ "data": "cliente_nombres" },
			{ "data": "venta_comprobante" },
			{ "data": "comprobante" },
			{ "data": "venta_total" },
			{ "data": "venta_fregistro" },
			{ "data": "usu_nombre" },
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
			{
				"data": "venta_comprobante",
				render: function (data, type, row) {
					if (data === "BOLETA" || data === "FACTURA") {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'   title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='imprimir text-primary px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span> <span class='abrir_whatsapp text-success px-1' style='cursor:pointer;'   title='enviar comprobante por whatsapp'><i class= 'fab fa-whatsapp'></i></span>" + "</center>"
					} else {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'  title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class=' text-secundary px-1' style='cursor:pointer;'  disabled><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span><span class='abrir_whatsapp text-success px-1' style='cursor:pointer;'   title='enviar comprobante por whatsapp'><i class= 'fab fa-whatsapp'></i></span>" + "</center>"
					}
				}
			},

			/*{
				"data": "venta_comprobante",
				render: function (data, type, row) {
					if (data === "BOLETA" || data === "FACTURA") {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'   title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='pagar text-success px-1' style='cursor:pointer;' title='Pagar la venta total'><i class= 'fa fa-hand-holding-usd'></i></span><span class='imprimir text-primary px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span>" + "</center>"
					} else {
						return "<center>" + "<span class='editarv text-primary px-1' style='cursor:pointer;'  title='Editar Comprobante'><i class= 'fa fa-eye'></i></span><span class='pagar text-success px-1' style='cursor:pointer;' title='Pagar la venta total'><i class= 'fa fa-hand-holding-usd'></i></span><span class=' text-secundary px-1' style='cursor:pointer;'  disabled><i class= 'fa fa-print'></i></span><span class='anular text-danger px-1' style='cursor:pointer;' title='Anular Comprobante'><i class= 'fa fa-ban'></i></span><span class='imprimirticket text-info px-1' style='cursor:pointer;' title='Imprimir Ticket'><i class= 'fa fa-file-pdf'></i></span>" + "</center>"
					}
				}
			},*/



		],
		"language": idioma_espanol,
		select: true
	});
	//contador en cada tabla
	tbl_venta.on('draw.td', function () {
		var PageInfo = $("#tabla_venta").DataTable().page.info();
		tbl_venta.column(0, { page: 'current' }).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
}






/**********************************************************************
			  EDITAR	DETALLE PRODUCTOS
***********************************************************************/

var tbl_ver_detalle_venta;
function Ver_detalle_venta(idventa) {//enviarlo al scrip en MANTENIMIENTO ROL
	tbl_ver_detalle_venta = $("#tabla_detalle_pro_editar").DataTable({
		"responsive": true,
		"ordering": false,
		"bLengthChange": true,
		"searching": { "regex": false },
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"pageLength": 10,
		"destroy": true,
		"async": false,
		"processing": true,
		"dom": '',
		"ajax": {
			"url": "../controller/venta/controlador_ver_detalle_venta.php",
			type: 'POST',
			data: {
				id: idventa
			}
		},
		"columns": [
			//todos los datos del procedimiento almacenado
			{ "data": "producto_id" },
			{ "data": "producto_nombre" },
			{ "data": "vdetalle_precio" },
			{ "data": "vdetalle_cantidad" },
			{ "data": "vdetalle_descuento" },
			{ "data": "subtotal" },

			// {"defaultContent": "<center>"+"<span class=' editar text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'><i class= 'fa fa-edit'></i></span> "+"</center>"}


		],
		"language": idioma_espanol,
		select: true
	});

}




/********************************************************************
		   PARA IMPRIMIR COMPROBANTE
********************************************************************/
$('#tabla_venta').on('click', '.imprimir', function () {//class foto tiene que ir en el boton
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}
	window.open("../MPDF/reporte_venta.php?codigo=" + parseInt(data.venta_id) + "#zoom=100", "Comprobante de Venta", "scrollbards=NO");
	
});


//ENVIAR COMPROBANTE POR WHATSAPP
$('#tabla_venta').on('click', '.abrir_whatsapp', function () {//class foto tiene que ir en el boton
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}
	//console.log(data);
	$("#modal_impresion").modal({ backdrop: 'static', keyboard: false });
	$("#modal_impresion").modal('show');//abrimos el modal
	 document.getElementById('text_movil_cl').value = data.cliente_celular;
	 document.getElementById('text_idventa').value = data.venta_id;
	 Traer_url_sistema();
});



//ENVIO RECEPCION A WHATSAPP
$('#enviar_com_what').on('click', function () {
	let venta_whatsa = document.getElementById('text_idventa').value;
	var rutaBase = document.getElementById('text_url_sistema').value;
	var cod_pais = document.getElementById('text_cod_pais').value;
	//let clientnombre = document.getElementById('text_nombrecliente_w').value;
	
	var numeromovil = document.getElementById("text_movil_cl").value;
	

	var rutaPDFticket = rutaBase+"MPDF/reporte_venta_electronica.php?codigo=" + parseInt(document.getElementById('text_idventa').value) + "#zoom=100";

	//var rutaPDFdeposito = "http://localhost/sertecver2_nueva/MPDF/reporte_resguardo_deposito.php?codigo=" + parseInt(document.getElementById('text_idrece_imp').value) + "#zoom=100";
    
    //Verificar si el número es válido (solo números y longitud adecuada)
    if (numeromovil.match(/^\d+$/) && numeromovil.length >= 9 && numeromovil.length <= 15) {
      // Construir la URL de WhatsApp con el número y el mensaje deseado
	  var mensaje = encodeURIComponent("Enlace para descargar el Comprobante de Venta: " + rutaPDFticket  );
      var url = "https://wa.me/"+cod_pais+numeromovil+"?text=" + mensaje;
      
      // Abrir la ventana de WhatsApp en una nueva pestaña
      window.open(url, '_blank');
    } else {

		
			Swal.fire("Error de Número", "Por favor, ingrese un número de WhatsApp válido.", "warning");
	
      //alert("Por favor, ingrese un número de WhatsApp válido.");
    }
});










//imprimir comprobante TICKET
$('#tabla_venta').on('click', '.imprimirticket', function () {//class foto tiene que ir en el boton
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}
	window.open("../MPDF/reporte_venta_electronica.php?codigo=" + parseInt(data.venta_id) + "#zoom=100", "Ticket de comprobante ", "scrollbards=NO");

});





/********************************************************************
		   EDITAR VENTA
********************************************************************/
$('#tabla_venta').on('click', '.editarv', function () { //id enviar( en el boton)
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}
	//console.log(data);

	rolA = document.getElementById('text_idrol').value; //CAPTURAMOS EL ROL PARA DAR EL ACCESO
	//console.log(data.fpago_id);

	if (data.fpago_id == 3) { //tarjeta y efectiv

		$("#efectivohabilitar_e").attr('hidden', false);//HABILITAMOS
		$("#codoperacionhabilitar_e").attr('hidden', false);//HABILITAMOS
		$("#montoperacionhabilitar_e").attr('hidden', false);//HABILITAMOS

	} else if (data.fpago_id == 2) { //tarjeta

		$("#codoperacionhabilitar_e").attr('hidden', false);//HABILITAMOS

		$("#efectivohabilitar_e").attr('hidden', true);
		$("#montoperacionhabilitar_e").attr('hidden', true);

	} else if (data.fpago_id == 1) { // EFECTIVO
		$("#efectivohabilitar_e").attr('hidden', true);
		$("#codoperacionhabilitar_e").attr('hidden', true);
		$("#montoperacionhabilitar_e").attr('hidden', true);

	} else {
		//console.log("ok");

	}

	if (rolA == 1) {
		$("#modal_editar_venta").modal({ backdrop: 'static', keyboard: false });
		$("#modal_editar_venta").modal('show');//abrimos el modal*/
		//jalamos los datos al presionar editar 
		document.getElementById('text_idventa_e').value = data.venta_id;
		document.getElementById('text_idcliente_e').value = data.cliente_id;
		document.getElementById('text_compro_e').value = data.venta_comprobante;
		document.getElementById('text_serie_e').value = data.venta_serie;
		document.getElementById('text_num_compro_e').value = data.venta_num_comprobante;
		document.getElementById('text_impuesto_e').value = data.venta_porcentaje;
		document.getElementById('text_comentario_e').value = data.observacion;
		document.getElementById('lbl_subtotal_e').value = data.subtotal2;
		document.getElementById('lbl_impuesto_e').value = data.venta_impuesto;
		document.getElementById('lbl_totalneto_e').value = data.venta_total;
		document.getElementById('lbl_descuento_e').value = data.venta_descuento;

		document.getElementById('text_efe_e').value = data.monto_efectivo;
		document.getElementById('text_tarj_e').value = data.cod_operacion;
		document.getElementById('text_monto_t_e').value = data.monto_tarjeta;

		document.getElementById('ver_venta').innerHTML = data.comprobante;//numero de factura en cabecera	
		//$("#select_estado").prop('disabled', false);// HABILITAMOS EL SELECT2 ESTADO'

		$("#select_estado").select2().val(data.venta_estado).trigger('change.select2');
		$("#select_cliente2_e").select2().val(data.cliente_id).trigger('change.select2');
		$("#select_forma_pago_V_e").select2().val(data.fpago_id).trigger('change.select2');
		$("#select_tipo_com_e").select2().val(data.compro_id).trigger('change.select2');


	} else {

		$("#modal_editar_venta").modal({ backdrop: 'static', keyboard: false });
		$("#modal_editar_venta").modal('show');//abrimos el modal*/
		//jalamos los datos al presionar editar 
		document.getElementById('text_idventa_e').value = data.venta_id;
		document.getElementById('text_idcliente_e').value = data.cliente_id;
		document.getElementById('text_compro_e').value = data.venta_comprobante;
		document.getElementById('text_serie_e').value = data.venta_serie;
		document.getElementById('text_num_compro_e').value = data.venta_num_comprobante;
		document.getElementById('text_impuesto_e').value = data.venta_porcentaje;
		document.getElementById('text_comentario_e').value = data.observacion;
		document.getElementById('lbl_subtotal_e').value = data.subtotal2;
		document.getElementById('lbl_impuesto_e').value = data.venta_impuesto;
		document.getElementById('lbl_totalneto_e').value = data.venta_total;
		document.getElementById('lbl_descuento_e').value = data.venta_descuento;

		document.getElementById('ver_venta').innerHTML = data.comprobante;//numero de factura en cabecera
		$('#btnmodificar').prop('hidden', true);// quitamos el boton modificar 


		$("#select_estado").select2().val(data.venta_estado).trigger('change.select2');
		$("#select_cliente2_e").select2().val(data.cliente_id).trigger('change.select2');
		$("#select_forma_pago_V_e").select2().val(data.fpago_id).trigger('change.select2');
		$("#select_tipo_com_e").select2().val(data.compro_id).trigger('change.select2');



	}


	Ver_detalle_venta(parseInt(data.venta_id)); //jalamos el id de la venta para mostrar los productos
});



/********************************************************************
	  CARGAR FORMA DE PAGO EN COMBO
********************************************************************/
function cargar_Select_FormaPAgo_v() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/cotizacion/controlador_cargar_select_forma_pago.php',
		type: 'POST'
	}).done(function (resp) {
		//console.log(resp);
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option >Seleccione...</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "' >" + data[i][1] + "</option>";
			}
			document.getElementById('select_forma_pago_V').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_forma_pago_V').innerHTML = llenardata;

		}
	})
}



/********************************************************************
	   CARGAR CLIENTES EN COMBO
 ********************************************************************/
function cargar_SelectCliente() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/recepcion/controlador_cargar_select_cliente.php',
		type: 'POST'
	}).done(function (resp) {
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option >Seleccione...</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "' >" + data[i][1] + "</option>";
			}
			document.getElementById('select_cliente2').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			//document.getElementById('select_cliente2_e').innerHTML = llenardata;
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_cliente2').innerHTML = llenardata;
			//document.getElementById('select_cliente2_e').innerHTML = llenardata;

		}
	})
}

//ENVIAMOS DATOS DE clientes A CAJAS DE TEXTO
$('#select_cliente2').on('select2:select', function (e) {
	let idC = document.getElementById('select_cliente2').value;
	// alert(id);
	document.getElementById('text_idcliente').value = idC;


})



/********************************************************************
		ABRIR MODAL REGISTRO DE CLINTES
********************************************************************/
function AbrirModalRegistroCliente() {
	//para que no se nos salga del modal haciendo click a los costados
	$("#modal_registro_cliente").modal({ backdrop: 'static', keyboard: false });
	$("#modal_registro_cliente").modal('show');//abrimos el modal
	//document.getElementById('text_categoria').value="";
	LimpiarModalCliente();
	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
}






/********************************************************************
		   REGISTRAR CLIENTE
********************************************************************/
function RegistrarCliente() {
	let nombre = document.getElementById('text_nombre').value;
	let dni = document.getElementById('text_dni').value;
	let cel = document.getElementById('text_celular').value;
	let direccion = document.getElementById('text_direccion').value;
	let apellidop = document.getElementById('text_ape_p').value;
	let apellidom = document.getElementById('text_ape_m').value;
	let correo = document.getElementById('text_correo').value;
	let tipo_doc = document.getElementById('select_tipo_doc').value;
	if (nombre.length == 0 || dni.length == 0 || cel.length == 0) {
		ValidarCamposCliente("text_nombre", "text_dni", "text_celular", "select_tipo_doc");
		return Swal.fire("Mensaje de Advertencia", "Tiene campos vacios", "warning");
	}

	$.ajax({
		url: '../controller/cliente/controlador_cliente_registar.php',
		type: 'POST',
		data: {
			nombre: nombre,//le enviamos los campos al controlador
			dni: dni,
			cel: cel,
			direccion: direccion,
			apellidop: apellidop,
			apellidom: apellidom,
			correo: correo,
			tipo_doc: tipo_doc
		}
	}).done(function (resp) {
		if (resp > 0) {
			if (resp == 1) {//validamos la respuesta del procedure si retorna 1 o 2
				Swal.fire("Mensaje de Confirmacion", "Cliente Registrado", "success").then((value) => {

					$("#modal_registro_cliente").modal('hide');//abrimos el modal
					cargar_SelectCliente();
					tbl_cliente.ajax.reload();//recargar dataTable
					//TraerNotificaciones();
				});
			} else {
				Swal.fire("Mensaje de Advertencia", "El Cliente ya se encuentra registrado", "warning");
			}

		} else {
			Swal.fire("Mensaje de Error", "No se puede registrar el Cliente", "error");
		}
	})
}


/********************************************************************
		   BOTON AGREGAR PRODUCTOS AL DETALLE 
********************************************************************/

function Agregar_Producto() {

	let idproducto = document.getElementById('text_idproducto').value;
	let producto = document.getElementById('text_producto').value;

	let cantidad = document.getElementById('text_cantidad').value;
	let stock = document.getElementById('text_stock').value;
	let precio = document.getElementById('text_precio').value;
	let subtotal = precio * cantidad;
	let impuesto = document.getElementById('text_impuesto').value;
	let imei = $('#select_imei option:selected').text();
	let productonombre = ($('#text_producto option:selected').text()).split(' |')[0];
	let descuent = document.getElementById('text_descuento').value;
	let tipo = document.getElementById('select_tipo_com').value;
	let imei_tiene = document.getElementById('text_tiene_imei').value;
	let selectimei_pro = document.getElementById('select_imei').value;
	let operdescuent = 0;

	//console.log(selectimei_pro);


	if (parseFloat(descuent) >= parseFloat(subtotal)) {
		return Swal.fire("El descuento excede al Monto del producto", "Revisar monto de Descuento", "warning");
	} else {
		operdescuent = parseFloat(subtotal) - parseFloat(descuent);
	}


	if (tipo == 2) {
		if (impuesto.length == 0) {
			return Swal.fire("Mensaje de Advertencia", "Debe llenar el impuesto antes de agregar un producto", "warning");
		}
		if (impuesto > 1.00) {
			return Swal.fire("Mensaje de Advertencia", "No puede asignar ese impuesto", "warning");
		}

	}

	if (imei_tiene == "Si" && selectimei_pro == "Seleccione") {
		return Swal.fire("Debe seleccionar un Imei", "el imei es bligatorio", "warning");

	} else if (selectimei_pro !== "Seleccione") {
		//console.log("paso1");

	} else {
		//console.log("paso2");
	}




	if (parseFloat(stock) < parseFloat(cantidad)) {
		return Swal.fire("El producto no tiene Stock suficiente", "Stock actual: " + stock + "  ", "warning");
	}

	if (producto.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Ingrese un Producto", "warning");
	}

	if (cantidad.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Ingrese una cantidad", "warning");
	}

	if (parseInt(cantidad) < 1) {
		return Swal.fire("Mensaje de Advertencia", "La cantidad debe ser mayor a 0", "warning");
	}

	if (parseInt(precio) < 0.1) {
		return Swal.fire("Mensaje de Advertencia", "El precio debe ser mayor a 0", "warning");
	}

	if (imei == "Seleccione") {

		imei_2 = " ";

	} else {
		imei_2 = imei;

	}

	//llamamos la funcion para verificar si ya esta agregado en el detalle
	if (verificarid2(imei_2)) {
		return Swal.fire("Mensaje de Advertencia", "El imei ya esta agregado", "warning");
	}



	let datos_agregar = "<tr>";
	datos_agregar += "<td for='id'>" + idproducto + "</td>";
	datos_agregar += "<td> " + productonombre + "</td>";
	datos_agregar += "<td>" + precio + "</td>";
	datos_agregar += "<td>" + cantidad + "</td>";
	datos_agregar += "<td>" + descuent + "</td>";
	datos_agregar += "<td>" + operdescuent + "</td>";
	datos_agregar += "<td><button class='btn btn-danger btn-sm remove2'  ><i class ='fa fa-trash'></i> </button></td>";
	datos_agregar += "<td style='display: block;' for='idimp'>" + imei_2 + "</td>";
	datos_agregar += "</tr>";
	$("#tbody_tabla_detalle_pro").append(datos_agregar);
	LimpiarModalProducto();
	SumarTotalneto();
	$("#select_imei").select2().val("").trigger('change.select2');
	$("#ocult_imei_vent").attr('hidden', true);
}



/********************************************************************
						 LIMPIAR TEXBOX PRODUCTO
********************************************************************/
function LimpiarModalProducto() {
	document.getElementById('text_producto').value = "";
	document.getElementById('text_stock').value = "";
	document.getElementById('text_precio').value = "";
	document.getElementById('text_cantidad').value = "";
	document.getElementById('text_descuento').value = "";
	$("#text_producto").select2().val("").trigger('change.select2');
	$("#select_imei").select2().val("Seleccione").trigger('change.select2');


}



/********************************************************************
		   PARA QUE NO SE REPITA UN PRODUCTO EN EL DETALLE
********************************************************************/
function verificarid(id) {
	let idverificar = document.querySelectorAll('#tabla_detalle_pro td[for="id"]');
	return [].filter.call(idverificar, td => td.textContent === id).length === 1;
}


function verificarid2(id) {
	let idverificar2 = document.querySelectorAll('#tabla_detalle_pro td[for="idimp"]');
	return [].filter.call(idverificar2, td => td.textContent.trim() === id.trim() && id.trim() !== "").length === 1;
}





/********************************************************************
		   REMOVER ITEM DEL DETALLE
********************************************************************/
function remove(t) {
	var td = t.parentNode;
	var tr = td.parentNode;
	var table = tr.parentNode;
	table.removeChild(tr);
	SumarTotalneto();
}
//REMOVER ITEM DEL DETALLE
$('#tbody_tabla_detalle_pro').on('click', '.remove2', function () {//
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}
	Swal.fire({
		title: 'Desea remover el articulo? ',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, confirmar'
	}).then((result) => {
		if (result.isConfirmed) {
			remove(this);
			SumarTotalneto();
		}
	})
});





/********************************************************************
		   SUMAR EN LOS LBL
********************************************************************/
function SumarTotalneto2222() {
	let arreglo_total = new Array();
	let count = 0;
	let total = 0;
	let impuestototal = 0;
	let impuesto = document.getElementById('text_impuesto').value;
	let subtotal = 0;
	$("#tabla_detalle_pro  tbody#tbody_tabla_detalle_pro tr ").each(function () {
		arreglo_total.push($(this).find('td').eq(4).text());//sub total
		count++;
	})
	for (var i = 0; i < count; i++) {
		var suma = arreglo_total[i];
		subtotal = (parseFloat(subtotal) + parseFloat(suma)).toFixed(2);//suma del sub total
		impuestototal = parseFloat(subtotal * impuesto).toFixed(2);
	};
	total = parseFloat(subtotal) + parseFloat(impuestototal);
	//calcula si es factura o boleta (factura es 2)
	let tipo = document.getElementById('select_tipo_com').value;
	let form_pago = document.getElementById('select_forma_pago_V').value;

	if ($("#ch_impuesto").is(':checked')) {
		$("#lbl_subtotal").html("<b>Sub Total:  </b> S/. " + subtotal);
		$("#lbl_impuesto").html("<b>IGV " + impuesto * 100 + "%: </b> S/." + impuestototal);
		$("#lbl_totalneto").html("<b>Total: </b> S/." + total.toFixed(2));
	} else {
		$("#lbl_subtotal").html("<b>Sub Total:  </b> S/. " + subtotal);
		$("#lbl_impuesto").html("<b>IGV " + 0 + "%: </b> S/." + " 0.00");

		$("#lbl_totalneto").html("<b>Total: </b> S/." + total.toFixed(2));
		//document.getElementById('text_monto_t').value = total;
	}



	if (form_pago == 2) { //TARJETA
		document.getElementById('text_monto_t').value = total;
		document.getElementById('text_efe').value = "0";
		document.getElementById('text_tarj').value = "";

	} else if (form_pago == 1) { // efectivo
		document.getElementById('text_efe').value = total;
		document.getElementById('text_tarj').value = "";
		document.getElementById('text_monto_t').value = "0";
	} else {
		document.getElementById('text_efe').value = "0";
		document.getElementById('text_tarj').value = "";
		document.getElementById('text_monto_t').value = "0";

	}


}


function SumarTotalneto() {
	let arreglo_total = new Array();
	let desct_total = new Array();
	let count = 0;
	let total = 0;
	let impuestototal = 0;
	let impuesto = document.getElementById('text_impuesto').value;
	let subtotal = 0;
	let subtocondescu = 0;
	let totalfinal = 0;
	$("#tabla_detalle_pro  tbody#tbody_tabla_detalle_pro tr ").each(function () {
		arreglo_total.push($(this).find('td').eq(5).text());//sub total

		desct_total.push($(this).find('td').eq(4).text());//sub total
		count++;
	})
	//console.log(arreglo_total);
	for (var i = 0; i < count; i++) {
		var suma = arreglo_total[i];
		var suma_desc = desct_total[i];
		subtotal = (parseFloat(subtotal) + parseFloat(suma) + parseFloat(suma_desc)).toFixed(2);//suma del sub total
		impuestototal = parseFloat(subtotal * impuesto).toFixed(2);
		subtocondescu = (parseFloat(subtocondescu) + parseFloat(suma_desc)).toFixed(2);
	};
	total = parseFloat(subtotal) + parseFloat(impuestototal) - parseFloat(subtocondescu);
	//totalfinal = parseFloat(subtotal) - parseFloat(subtocondescu);
	//calcula si es factura o boleta (factura es 2)
	let tipo = document.getElementById('select_tipo_com').value;
	let form_pago = document.getElementById('select_forma_pago_V').value;

	if (tipo == 2) {
		$("#lbl_subtotal").html("<b>Sub Total:  </b> S/. " + subtotal);
		$("#lbl_impuesto").html("<b>IGV " + impuesto * 100 + "%: </b> S/." + impuestototal);
		$("#lbl_descuento").html("<b>Desct.: </b> S/." + subtocondescu);
		$("#lbl_totalneto").html("<b>Total: </b> S/." + total.toFixed(2));

		$("#totalVenta").html(total.toFixed(2));
		$("#boleta_total").html(total.toFixed(2));
		$("#boleta_subtotal").html(subtotal);
		$("#boleta_igv").html(impuestototal);
		$("#boleta_descuento").html(subtocondescu);
	} else {
		$("#lbl_subtotal").html("<b>Sub Total:  </b> S/. " + subtotal);
		$("#lbl_descuento").html("<b>Desct.: </b> S/." + subtocondescu);
		$("#lbl_totalneto").html("<b>Total: </b> S/." + total);

		$("#totalVenta").html(total.toFixed(2));
		$("#boleta_total").html(total.toFixed(2));
		$("#boleta_subtotal").html(subtotal);
		$("#boleta_igv").html(impuestototal);
		$("#boleta_descuento").html(subtocondescu);
	}

	if (form_pago == 2) { //TARJETA
		document.getElementById('text_monto_t').value = total;
		document.getElementById('text_efe').value = "0";
		document.getElementById('text_tarj').value = "";

	} else if (form_pago == 1) { // efectivo
		document.getElementById('text_efe').value = total;
		document.getElementById('text_tarj').value = "";
		document.getElementById('text_monto_t').value = "0";
	} else {
		document.getElementById('text_efe').value = "0";
		document.getElementById('text_tarj').value = "";
		document.getElementById('text_monto_t').value = "0";

	}
}





/********************************************************************
		   REGISTRAR VENTA CABECERA
********************************************************************/
function Registrar_Venta() {
	let count = 0; //para validar que el detalle tenga un dato
	//recorremos la tabla
	$("#tabla_detalle_pro  tbody#tbody_tabla_detalle_pro tr ").each(function () {
		count++; //cuenta las filas 
	})
	//alert(count);

	//validamos con mensaje que tenga datos en el detalle
	if (count == 0) {
		return Swal.fire("Mensaje de Advertencia", "Debe agregar un Producto en el detalle de la venta", "warning");
	}

	//declaramos los campos y se jalan del index del form

	let idcliente = document.getElementById('text_idcliente').value;
	let compro = document.getElementById('text_compro').value;
	let serie = document.getElementById('text_serie').value;
	let numero = document.getElementById('text_num_compro').value;
	let impuesto = 0;
	let total = document.getElementById('lbl_totalneto').innerHTML.substr(18);
	let totaldesct = document.getElementById('lbl_descuento').innerHTML.substr(19);
	let tipo = document.getElementById('select_tipo_com').value;
	//console.log(tipo);
	let porcentaje = 0;
	let idusuario = document.getElementById('text_Idprincipal').value;//id_usuario esta en el index como text_Idprincipal
	let idformapago = document.getElementById('select_forma_pago_V').value;
	let observacion = document.getElementById('text_comentario').value;

	let monto_efectiv = document.getElementById('text_efe').value;
	let cod_opera = document.getElementById('text_tarj').value;
	let monto_tarje = document.getElementById('text_monto_t').value;
	let cajaid_v = document.getElementById('text_idcaja').value;

	if (tipo == 2) {
		porcentaje = document.getElementById('text_impuesto').value;
		impuesto = document.getElementById('lbl_impuesto').innerHTML.substr(20);
	} else {
		porcentaje = 0;
		impuesto = 0;
	}


	// if ($("#ch_impuesto").is(':checked')) {
	// 	porcentaje = document.getElementById('text_impuesto').value;
	// 	impuesto = document.getElementById('lbl_impuesto').innerHTML.substr(20);
	// 	console.log(impuesto);
	// } else {
	// 	porcentaje = 0;
	// 	impuesto = 0;
	// }

	if (idformapago == 3) { //tarjeta y efectiv

		if (monto_efectiv == "") {
			return Swal.fire("Mensaje de Advertencia", "ingrese el monto en efectivo", "warning");
		}
		if (cod_opera == "") {
			return Swal.fire("Mensaje de Advertencia", "ingrese el codigo de la operacion", "warning");
		}
		if (monto_tarje == "") {
			return Swal.fire("Mensaje de Advertencia", "ingrese el monto de la tarjeta", "warning");
		}

	} else if (idformapago == 2) { //tarjeta

		if (cod_opera == "") {
			return Swal.fire("Mensaje de Advertencia", "ingrese el codigo de la operacion", "warning");
		}
		if (monto_tarje == "") {
			return Swal.fire("Mensaje de Advertencia", "ingrese el monto de la tarjeta", "warning");
		}

	} else {
		//console.log("ok");

	}


	//valida que se seleccione un cliente o comprobante
	if (idcliente.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Debe seleccionar un Cliente", "warning");
	}

	if (tipo.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Debe seleccionar un Tipo de Comprobante", "warning");
	}


	if (tipo == "Seleccione...") {
		return Swal.fire("Mensaje de Advertencia", "Debe seleccionar un Tipo de Comprobante", "warning");
	}


	if (idformapago == "Seleccione...") {
		return Swal.fire("Mensaje de Advertencia", "Debe seleccionar una forma de pago", "warning");
	}

	$.ajax({
		url: '../controller/venta/controlador_venta_registar.php',
		type: 'POST',
		data: {
			idcliente: idcliente,
			compro: compro,
			serie: serie,
			numero: numero,
			impuesto: impuesto,
			total: total,
			tipo: tipo,
			porcentaje: porcentaje,
			idusuario: idusuario,
			idformapago: idformapago,
			observacion: observacion,
			monto_efectiv: monto_efectiv,
			cod_opera: cod_opera,
			monto_tarje: monto_tarje,
			cajaid_v: cajaid_v,
			totaldesct: totaldesct


		}
	}).done(function (resp) {
		//alert(resp);
		if (resp > 0) {
			//llamamos al registrar detalle y convertirmos en entero la resp
			Registrar_Detalle_Venta(parseInt(resp));
			//console.log(resp);

		} else {
			return Swal.fire("Mensaje de Error", "No se pudo completar el registro", "error");
		}
	})
}




/********************************************************************
		   REGISTRAR DETALLE 
********************************************************************/
function Registrar_Detalle_Venta(id) {
	let idcompro = document.getElementById('text_idcompro').value; //tipo de comprobante

	let count = 0;
	let arreglo_producto = new Array();
	let arreglo_cantidad = new Array();
	let arreglo_precio = new Array();
	let arreglo_imei = new Array();
	let arreglo_descuen = new Array();
	$("#tabla_detalle_pro  tbody#tbody_tabla_detalle_pro tr ").each(function () {
		arreglo_producto.push($(this).find('td').eq(0).text());
		arreglo_cantidad.push($(this).find('td').eq(3).text());
		arreglo_precio.push($(this).find('td').eq(2).text());
		arreglo_imei.push($(this).find('td').eq(7).text());
		arreglo_descuen.push($(this).find('td').eq(4).text());
		count++;
	})

	if (count == 0) {
		return Swal.fire("Mensaje de Advertencia", "Debe agregar un Producto en el detalle", "warning");
	}

	let producto = arreglo_producto.toString();
	let cantidad = arreglo_cantidad.toString();
	let precio = arreglo_precio.toString();
	let imei_r = arreglo_imei.toString();
	let descuent_p = arreglo_descuen.toString();

	$.ajax({
		url: '../controller/venta/controlador_venta_detalle_registar.php',
		type: 'POST',
		data: {
			id: id,
			producto: producto,
			cantidad: cantidad,
			precio: precio,
			imei_r: imei_r,
			descuent_p: descuent_p

		}
	}).done(function (resp) {
		//alert(id);
		if (resp > 0) {
			Swal.fire({
				title: 'Datos Confirmacion',
				text: "Datos Registrados correctamente",
				icon: 'success',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Imprimir Comprobante?'
			}).then((result) => {
				if (result.value) {
					if (idcompro == 3) {
						window.open("../MPDF/reporte_venta_electronica.php?codigo=" + parseInt(id) + "#zoom=100", "Comprobante de Venta - ticket", "scrollbards=NO");
					} else {
						window.open("../MPDF/reporte_venta.php?codigo=" + parseInt(id) + "#zoom=100", "Comprobante de Venta", "scrollbards=NO");
						$("#contenido_principal").load("venta/mantenimiento_venta.php");
					}

				}
				$("#contenido_principal").load("venta/mantenimiento_venta.php");
			})

		} else {
			return Swal.fire("Mensaje de Error", "No se pudo completar el registro", "error");
		}
	})
}


/********************************************************************
						CLICK EN ANULAR VENTA - MENSAJE
********************************************************************/
$('#tabla_venta').on('click', '.anular', function () {//campo activar tiene que ir en el boton
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}

	rolA = document.getElementById('text_idrol').value; //CAPTURAMOS EL ROL PARA DAR EL ACCESO
	//console.log(rolA);

	Swal.fire({
		title: 'Desea Anular La venta?',
		text: "Retornara el stock de producto",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Anular Venta'
	}).then((result) => {

		if (result.isConfirmed) {
			//QUITAL EL PRIMER IF SI QUIEREN DAR ACCESO PARA ANULAR LA VENTA
			if (rolA == 1 ) {
				Anular_Venta(data.venta_id, "ANULADA");//data 0 (id)
			} else if (data.venta_estado == "ANULADA") {
				Swal.fire("Mensaje de Error", "La venta se encuentra ANULADA, Revisar", "error");

			} else {
				

				Swal.fire("Mensaje de Error", "Ud no tiene el acceso para Anular Ventas , Revisar con el administrador", "error");
				//console.log(data.rol_id);
			}
		}

	})
});



/********************************************************************
	  FUNCION ANULAR LA VENTA Y REGRESAR STOCK A PRODUCTOS
********************************************************************/
function Anular_Venta(id, estado) {
	$.ajax({
		url: '../controller/venta/controlador_anular_venta.php',
		type: 'POST',
		data: {
			id: id,//le enviamos los campos al controlador
			estado: estado

		}
	}).done(function (resp) {
		if (resp > 0) {
			Swal.fire("Mensaje de Confirmacion", "Venta Anulada", "success").then((value) => {
				tbl_venta.ajax.reload();//recargar dataTable
				//TraerNotificaciones();
			});
		} else {
			Swal.fire("Mensaje de Error", "No se puede Anular la Venta", "error");
		}
	})
}




/********************************************************************
					   CLICK EN PAGAR LA VENTA - MENSAJE
********************************************************************/
$('#tabla_venta').on('click', '.pagar', function () {//campo activar tiene que ir en el boton
	var data = tbl_venta.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_venta.row(this).child.isShown()) {
		var data = tbl_venta.row(this).data();//para celular y usas el responsive datatable
	}

	//rol = document.getElementById('text_idrol').value;
	//console.log(rol);

	Swal.fire({
		title: 'Desea Pagar :' + data.venta_comprobante + '(' + data.venta_serie + '-' + data.venta_num_comprobante + ')',
		text: "Monto S/: " + data.venta_total,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Pagar la Venta'
	}).then((result) => {
		if (result.isConfirmed) {
			//if (rol == 2 || rol == 3) { 
			//	Swal.fire("Mensaje de Error","Ud no tiene el acceso para Pagar , Revisar con el administrador","error");
			//}else 
			if (data.venta_estado == "PAGADA" || data.venta_estado == "ANULADA") {
				Swal.fire("Mensaje de Error", "La venta se encuentra PAGADA o ANULADA, Revisar", "error");

			} else {
				Pagar_Venta(data.venta_id, "PAGADA");//data 0 (id)
				//console.log(data.rol_id);
			}
		}
	})
});





/********************************************************************
	  FUNCION PAGAR LA VENTA 
********************************************************************/
function Pagar_Venta(id, estado) {
	//estadoPagar = data.venta_estado;
	//console.log(estadoPagar);

	$.ajax({
		url: '../controller/venta/controlador_pagar_venta.php',
		type: 'POST',
		data: {
			id: id,//le enviamos los campos al controlador
			estado: estado

		}
	}).done(function (resp) {
		if (resp > 0) {
			Swal.fire("Mensaje de Confirmacion", "Venta Pagada", "success").then((value) => {
				tbl_venta.ajax.reload();//recargar dataTable
				//TraerNotificaciones();
			});
		} else {
			Swal.fire("Mensaje de Error", "No se puede Pagar la Venta", "error");
		}
	})
}


function Traer_url_sistema() {

	$.ajax({
		url: '../controller/caja/controlador_traer_datos_ventas.php',
		type: 'POST'

	}).done(function (resp) {
		//console.log(resp);
		let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA
		//console.log(data[0][13]);
			//document.getElementById('text_numerocel').value = data.cliente_celular;
			document.getElementById('text_url_sistema').value = data[0][13];
			document.getElementById('text_cod_pais').value = data[0][14];

	})
}









/********************************************************************
		   VALIDAR TEXBOX CLIENTE
********************************************************************/
function ValidarCamposCliente(nombre, dni, celular) {
	Boolean(document.getElementById(nombre).value.length > 0) ? $("#" + nombre).removeClass("is-invalid").addClass("is-valid") : $("#" + nombre).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(dni).value.length > 0) ? $("#" + dni).removeClass("is-invalid").addClass("is-valid") : $("#" + dni).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(celular).value.length > 0) ? $("#" + celular).removeClass("is-invalid").addClass("is-valid") : $("#" + celular).removeClass("is-valid").addClass("is-invalid");
}





/********************************************************************
		   LIMPIAR TEXBOX CLIENTE
********************************************************************/
function LimpiarModalCliente() {
	document.getElementById('text_nombre').value = "";
	document.getElementById('text_dni').value = "";
	document.getElementById('text_celular').value = "";
	document.getElementById('text_direccion').value = "";
	document.getElementById('text_ape_p').value = "";
	document.getElementById('text_ape_m').value = "";
}



/********************************************************************
		 MODIFICAR ESTADO DE LA VENTA
 ********************************************************************/
function Estado_Venta() {//enviamos los datos del ajax al controlador y al onclick del boton editar
	let idventa = document.getElementById('text_idventa_e').value;
	let estado = document.getElementById('select_estado').value;

	$.ajax({
		url: '../controller/venta/controlador_modificar_estado_venta.php',
		type: 'POST',
		data: {
			idventa: idventa,//le enviamos los campos al controlador				 
			estado: estado
		}
	}).done(function (resp) {
		if (resp > 0) {
			Swal.fire("Mensaje de Confirmacion", "Estado de la venta actualizada", "success").then((value) => {
				$("#modal_editar_venta").modal('hide');//ocultamos modal despues de registrar
				tbl_venta.ajax.reload();//recargar dataTable

			});
		} else {
			Swal.fire("Mensaje de Error", "No se puede modificar la Empresa", "error");
		}
	})
}



/**********************************************************************
		LISTAR ESTADO DE LA CAJA Y VALIDAR PARA HACER UNA VENTA
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
				$('#textnuevaventa').prop('hidden', false);//boton nueva venta
			} else {
				//QUITAMOS EL BOTON SI LA CAJA NO ESTA APERTURADA
				Swal.fire("Mensaje de Error", "Tienes que Aperturar una caja", "error");
				$('#textnuevaventa').prop('hidden', true);// quitamos el boton modificar 
			}



		}
	})
}

function Traer_caja_id() {

	$.ajax({
		url: '../controller/caja/controlador_traer_datos_ventas.php',
		type: 'POST'

	}).done(function (resp) {
		//console.log(resp);
		let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

		if (data.length > 0) {

			document.getElementById('text_idcaja').value = data[0][12];

		}
	})
}


function Traer_Imei_pro(id_pro) {

	$.ajax({
		url: '../controller/venta/controlador_traer_imeiprod_venta.php',
		type: 'POST',
		data: {
			id_pro: id_pro
		}
	}).done(function (resp) {
		let data = JSON.parse(resp);
		//console.log(data.length);
		let llenardata = "<option value='Seleccione'>Seleccione</option> ";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";

			}
			document.getElementById('select_imei').innerHTML = llenardata;
			document.getElementById('text_cantidad').disabled = true;//deshabilitamos el boton
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_imei').innerHTML = llenardata;
			document.getElementById('text_cantidad').disabled = false;

		}
	})
}





