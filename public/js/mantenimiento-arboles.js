function limpiarArbol(){
	document.getElementById( "id_arbol" ).value = "0";
    document.getElementById( "pictureTree" ).value = "";
	document.getElementById( "nombreCientifico" ).value = "";
	document.getElementById( "nombreComun" ).value = "";
	document.getElementById( "jiffys" ).value = "";
	document.getElementById( "bolsas" ).value = "";
	document.getElementById( "elevacion_minima" ).value = "";
	document.getElementById( "elevacion_maxima" ).value = "";
}

function editarArbol( row_id ){
	var arbol = document.getElementById( row_id );
	document.getElementById( "id_arbol" ).value = arbol.getAttribute( "data-id" );
    document.getElementById( "pictureTree" ).value = "";
	document.getElementById( "nombreCientifico" ).value = arbol.getAttribute( "data-nombre_cientifico" );
	document.getElementById( "nombreComun" ).value = arbol.getAttribute( "data-nombres_comunes" );
	document.getElementById( "jiffys" ).value = arbol.getAttribute( "data-jiffys" );
	document.getElementById( "bolsas" ).value = arbol.getAttribute( "data-bolsas" );
	document.getElementById( "elevacion_minima" ).value = arbol.getAttribute( "data-elevacion_minima" );
	document.getElementById( "elevacion_maxima" ).value = arbol.getAttribute( "data-elevacion_maxima" );
}