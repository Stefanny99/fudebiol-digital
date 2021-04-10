function confirmarAdopcion( fpa_id ) {

  alertify.confirm( "¿Realmente deseas continuar?, esta opción es irreversible." ).setting( {
    title: "Confirmar adopción",
    labels: {
        ok: "Sí",
        cancel: "Cancelar"
    },
    onok: () => {
        let data = new FormData();
        data.append( "nombre", valor );
        axios.post( routes.aceptarAdopcion, data ).then( response => {
          if ( response.data.exito ){

          } else if ( response.data.errores ){
            response.data.errores.forEach( error => alertify.notify( error, "error" ) );
          }
        } ).catch( error => {
            console.log( error );
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
        let data = new FormData();
        data.append( "nombre", valor );
        axios.post( "ruta", data ).then( response => {
            
        } ).catch( error => {
            console.log( error );
        } );
    }
  } );

}

