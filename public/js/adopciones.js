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
            arbol.classList.add( a && a.adopciones <= 0 && !a.FAO_ID ? "disponible" : "adoptado" );
            if ( a ){
                arbol.setAttribute( "data-arbol-id", a.FA_ID );
                arbol.setAttribute( "data-formato", a.FA_IMAGEN_FORMATO );
                arbol.setAttribute( "data-nombre-cientifico", a.FA_NOMBRE_CIENTIFICO );
                arbol.setAttribute( "data-id", a.FAL_ID );
                arbol.setAttribute( "data-coordenada-n", a.FAL_COORDENADA_N );
                arbol.setAttribute( "data-coordenada-w", a.FAL_COORDENADA_W );
                arbol.setAttribute( "data-fila", a.FAL_FILA );
                arbol.setAttribute( "data-columna", a.FAL_COLUMNA );
                arbol.setAttribute( "data-adopciones", a.adopciones );
                if ( a.FP_NOMBRE_COMPLETO ){
                    arbol.setAttribute( "data-padrino", a.FP_NOMBRE_COMPLETO );
                }
                arbol.onclick = () => visualizarArbol( lote, arbol );
            }else{
                arbol.style.opacity = "0.3";
            }
            fila.append( arbol );
        }
        visualizador.append( fila );
    }
}

function visualizarArbol( lote, arbol ){
    document.getElementById( "arbolInfo" ).src = arbol.getAttribute( "data-formato" ) != "" && arbol.getAttribute( "data-formato" ) != "null" ? imagenes_arboles + "/" + arbol.getAttribute( "data-arbol-id" ) + "." + arbol.getAttribute( "data-formato" ) : sinfoto;
    document.getElementById( "fal_id" ).value = arbol.getAttribute( "data-id" );
    document.getElementById( "lote_arbol" ).innerHTML = lotes[ lote ].FL_NOMBRE;
    document.getElementById( "nombre_arbol" ).innerHTML = arbol.getAttribute( "data-nombre-cientifico" );
    document.getElementById( "coordenada_N_arbol" ).innerHTML = arbol.getAttribute( "data-coordenada-n" );
    document.getElementById( "coordenada_W_arbol" ).innerHTML = arbol.getAttribute( "data-coordenada-w" );
    document.getElementById( "fila_arbol" ).innerHTML = arbol.getAttribute( "data-fila" );
    document.getElementById( "columna_arbol" ).innerHTML = arbol.getAttribute( "data-columna" );
    if ( arbol.hasAttribute( "data-padrino" ) ){
        document.getElementById( "padrino_arbol" ).innerHTML = arbol.getAttribute( "data-padrino" );
        document.getElementById( "padrino" ).style.display = "block";
    }else{
        document.getElementById( "padrino" ).style.display = "none";
    }
    
    document.getElementById( "btn_adoptar_arbol" ).style.display = arbol.classList.contains( "disponible" ) ? "" : "none";
    window.location = "#visualizador_arbol";
    let link = document.getElementById( "link_arbol" );
    link.onclick = () => goToGoogleMaps( arbol.getAttribute( "data-coordenada-w" ), arbol.getAttribute( "data-coordenada-n" ) );
}

function verificarCedula(){
    axios.get( buscar_padrino + "?fp_cedula=" + document.getElementById( "fp_cedula" ).value ).then( response => {
        fp_id = "";
        fp_nombre_completo = "";
        fp_correo = "";
        if ( response.data.exito ){
            fp_id = response.data.padrino.FP_ID;
            fp_nombre_completo = response.data.padrino.FP_NOMBRE_COMPLETO;
            fp_correo = response.data.padrino.FP_CORREO;
            document.getElementById( "btn_enviar_comprobante" ).disabled = false;
        }else{
            document.getElementById( "btn_enviar_comprobante" ).disabled = true;
            response.data.errores.forEach( error => {
                alertify.notify( error, "error" );
            } );
        }
        document.getElementById( "fp_id" ).value = fp_id;
        document.getElementById( "fp_nombre_completo_hidden" ).value = fp_nombre_completo;
        document.getElementById( "fp_nombre_completo" ).innerHTML = fp_nombre_completo;
        document.getElementById( "fp_correo" ).innerHTML = fp_correo;
    } ).catch( error => {
        console.log( error );
    } );
}

function actualizarToken(){
    axios.get( actualizar_token ).then( response => {
        if ( !response.data.exito ){
            response.data.errores.forEach( error => {
                console.log( error );
                alertify.botify( "No se pudo actualizar el token: " + error, "error" );
            } );
            window.location = ver_arboles;
        }
    } ).catch( error => {
        console.log( error );
    } );
}

function goToGoogleMaps(coordW, coordN){
    let deg = parseFloat(coordW.split( "°" )[0]);
    let min = parseFloat(coordW.split("°").pop().split("'")[0]);
    let sec = parseFloat(coordW.split( "'" )[1]);
    const lng = ((deg + ( min / 60 ) + ( sec / 3600 )) * -1).toFixed(6);
    deg = parseFloat(coordN.split( "°" )[0]);
    min = parseFloat(coordN.split("°").pop().split("'")[0]);
    sec = parseFloat(coordN.split( "'" )[1]);
    const lat =  (deg + ( min / 60 ) + ( sec / 3600 )).toFixed(6);
    window.open("https://www.google.com/maps/search/?api=1&query=" + lat + "," + lng + "&zoom=15&basemap=satellite");
}