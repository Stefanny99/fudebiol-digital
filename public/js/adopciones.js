function adopciones_cargarLote( lote ){
    let visualizador = document.getElementById( "VisualizacionArboles" );
    visualizador.innerHTML = "";
    for ( let i = 0; i < lotes[ lote ].FL_FILAS; ++i ){
        let fila = document.createElement( "div" );
        for ( let j = 0; j < lotes[ lote ].FL_COLUMNAS; ++j ){
            let arbol = document.createElement( "i" );
            let a = lotes[ lote ].arboles.find( a => a.FAL_FILA == i && a.FAL_COLUMNA == j );
            arbol.classList.add( "fas" );
            arbol.classList.add( "fa-tree" );
            arbol.classList.add( a && a.adopciones <= 0 ? "disponible" : "adoptado" );
            if ( !a ){
                arbol.style.opacity = "0.3";
            }
            fila.append( arbol );
        }
        visualizador.append( fila );
    }
}