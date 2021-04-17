function limpiarArbolLote(){
	document.getElementById( "id_arbol_lote" ).value = "0";
	document.getElementById( "coordenadaW" ).value = "";
	document.getElementById( "coordenadaN" ).value = "";
	document.getElementById( "fila" ).value = "";
	document.getElementById( "columna" ).value = "";
}

function editarArbolLote( row_id ){
	let arbol = document.getElementById( row_id );
	document.getElementById( "id_arbol_lote" ).value = arbol.getAttribute( "data-id" );
	document.getElementById( "especie" ).value = arbol.getAttribute( "data-arbol-id" );
	document.getElementById( "lote" ).value = arbol.getAttribute( "data-lote-id" );
	document.getElementById( "coordenadaW" ).value = arbol.getAttribute( "data-coordenada-W" );
	document.getElementById( "coordenadaN" ).value = arbol.getAttribute( "data-coordenada-N" );
	document.getElementById( "fila" ).value = arbol.getAttribute( "data-fila" );
	document.getElementById( "columna" ).value = arbol.getAttribute( "data-columna" );
}