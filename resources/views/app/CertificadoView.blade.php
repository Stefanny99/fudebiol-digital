<!DOCTYPE html>
<html>
    <head>
        <title>Certificado de adopción</title>
        <meta charset="utf-8">
        <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/themes/default.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/alertify.min.js') }}"></script>
        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset( 'js/certificado.js' ) }}"></script>
        @if ( $adopcion )
        <script>
            var plantilla_certificado = "{{ asset( 'img/certificado.png' ) }}";
            var adopcion = <?php echo json_encode( $adopcion ) ?>
        </script>
        @endif
    </head>
    <body onload="{{ $adopcion ? 'cargarCertificado()' : '' }}">
        @if ( $error )
        <script>alertify.alert( "Error", "{{ $error }}" )</script>
        @endif
        @if ( $adopcion )
        <canvas id="canvas_certificado" width="1547" height="1155"></canvas>
        <a id="descargar_certificado" download="Certificado_Mi_Árbol_Para_La_Vida_{{ $adopcion->FPA_ID }}.png" style="display: none;"></a>
        @endif
    </body>
</html>