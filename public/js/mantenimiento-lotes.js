function limpiarLote(){
	document.getElementById( "id_lote" ).value = "0";
	document.getElementById( "codigo_lote" ).value = "";
	document.getElementById( "tamano_lote" ).value = "";
	document.getElementById( "filas_lote" ).value = "";
	document.getElementById( "columnas_lote" ).value = "";
}

function editarLote( row_id ){
	var lote = document.getElementById( row_id );
	document.getElementById( "id_lote" ).value = lote.getAttribute( "data-id" );
	document.getElementById( "codigo_lote" ).value = lote.getAttribute( "data-codigo" );
	document.getElementById( "tamano_lote" ).value = lote.getAttribute( "data-tamano" );
	document.getElementById( "filas_lote" ).value = lote.getAttribute( "data-filas" );
	document.getElementById( "columnas_lote" ).value = lote.getAttribute( "data-columnas" );
}