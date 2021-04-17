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
        @if ( Session::has( "error" ) )
        <script>alertify.notify( "{{ Session::get( "error" ) }}", "error" )</script>
        @endif
        @if ( $adopcion )
        <canvas id="canvas_certificado" width="1547" height="1155"></canvas>
        @endif
    </body>
</html>