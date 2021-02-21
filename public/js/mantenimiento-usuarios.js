function limpiarUsuario(){
	document.getElementById( "id_usuario" ).value = "0";
	document.getElementById( "nombre_usuario" ).value = "";
	document.getElementById( "email_usuario" ).value = "";
	document.getElementById( "nombreusuario_usuario" ).value = "";
	document.getElementById( "clave_usuario" ).value = "";
	document.getElementById( "confirmacion_clave_usuario" ).value = "";
}

function editarUsuario( row_id ){
	var usuario = document.getElementById( row_id );
	document.getElementById( "id_usuario" ).value = usuario.getAttribute( "data-id" );
	document.getElementById( "nombre_usuario" ).value = usuario.getAttribute( "data-name" );
	document.getElementById( "email_usuario" ).value = usuario.getAttribute( "data-email" );
	document.getElementById( "nombreusuario_usuario" ).value = usuario.getAttribute( "data-username" );
	document.getElementById( "clave_usuario" ).value = "";
	document.getElementById( "confirmacion_clave_usuario" ).value = "";
	document.getElementById( "rol_usuario" ).value = usuario.getAttribute( "data-role" );
	document.getElementById( "check" ).checked = false;
}