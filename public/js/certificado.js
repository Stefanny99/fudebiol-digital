function cargarCertificado(){
    let ctx = document.getElementById( "canvas_certificado" ).getContext( "2d" );
    let plantilla = document.createElement( "img" );
    plantilla.onload = () => ctx.drawImage( plantilla, 0, 0 );
    plantilla.src = plantilla_certificado;
}