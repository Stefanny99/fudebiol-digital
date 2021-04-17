function cargarCertificado(){
    let ctx = document.getElementById( "canvas_certificado" ).getContext( "2d" );
    let plantilla = document.createElement( "img" );
    plantilla.onload = () => {
        ctx.drawImage( plantilla, 0, 0 );
        
        ctx.textBaseline = "middle";

        ctx.font = "50px san-serif";
        ctx.textAlign = "center";
        ctx.fillText( adopcion.FP_NOMBRE_COMPLETO, 771, 520 );

        ctx.font = "30px san-serif";
        ctx.textAlign = "right";
        
        ctx.fillText( adopcion.FL_NOMBRE, 560, 906, 375 );

        ctx.fillText( "N: " + adopcion.FAL_COORDENADA_N, 560, 956, 205 );

        ctx.fillText( "W: " + adopcion.FAL_COORDENADA_W, 560, 1007, 205 );

        ctx.font = "15px san-serif";
        ctx.fillText( adopcion.FA_NOMBRES_COMUNES.replaceAll( "-", ", " ) + ` (${ adopcion.FA_NOMBRE_CIENTIFICO })`, 560, 1058, 280 );

        let link = document.getElementById( "descargar_certificado" );
        link.href = document.getElementById( "canvas_certificado" ).toDataURL( "image/png" ).replace( "image/png", "image/octet-stream" );
        link.click();
    };
    plantilla.src = plantilla_certificado;
}