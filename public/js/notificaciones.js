function confirmarAdopcion( fpa_id ) {
  alertify.confirm( "¿Realmente deseas continuar?, esta opción es irreversible." ).setting( {
    title: "Confirmar adopción",
    labels: {
        ok: "Sí",
        cancel: "Cancelar"
    },
    onok: () => {
        document.getElementById( "panel-cargando" ).style.display = "flex";
        let data = new FormData();
        data.append( "fpa_id", fpa_id );
        axios.post( routes.aceptarAdopcion, data ).then( response => {
          if ( response.data.exito ){
            eliminarAdopcion( fpa_id );
            alertify.notify( "Adopcion aceptada correctamente.", "success" );
          } else if ( response.data.errores ){
            response.data.errores.forEach( error => alertify.notify( error, "error" ) );
          }
          document.getElementById( "panel-cargando" ).style.display = "none";
        } ).catch( error => {
            console.log( error );
            document.getElementById( "panel-cargando" ).style.display = "none";
        } );
    }
  } );

}

function rechazarAdopcion( fpa_id ) {
  alertify.confirm( "¿Realmente deseas continuar?, esta opción es irreversible." ).setting( {
    title: "Rechazar adopción",
    labels: {
        ok: "Sí",
        cancel: "Cancelar"
    },
    onok: () => {
        document.getElementById( "panel-cargando" ).style.display = "flex";
        let data = new FormData();
        data.append( "fpa_id", fpa_id );
        axios.post( routes.rechazarAdopcion, data ).then( response => {
          if ( response.data.exito ){
            eliminarAdopcion( fpa_id );
            alertify.notify( "Adopcion rechazada exitosamente.", "success" );
          } else if ( response.data.errores ){
            response.data.errores.forEach( error => alertify.notify( error, "error" ) );
          }
          document.getElementById( "panel-cargando" ).style.display = "none";
        } ).catch( error => {
            console.log( error );
            document.getElementById( "panel-cargando" ).style.display = "none";
        } );
    }
  } );
}

function eliminarAdopcion( id ){
  let contenedor =  document.getElementById( "contenedor_mensajesN" );
  contenedor.removeChild( document.getElementById( "notificacion-" + id ) );
  var notificaciones = document.getElementById( "cantidadNotificaciones" );
  notificaciones.innerHTML = "Nuevas adopciones: " + (parseInt(notificaciones.textContent.substring(19, notificaciones.textContent.length )) - 1);
}