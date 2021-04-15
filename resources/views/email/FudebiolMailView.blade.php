<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <div style="margin: 0 auto; text-align: center;">
      <img src="http://fudebiol.com/images/logo_06.png"/>
    </div>

    <p>Hola, {{ $details['nombre'] }}, Centro Biológico las Quebradas le saluda.</p>

    <p>Hemos recibido una solicitud de adopción para el árbol: {{ $details['especie'] }}, del lote: {{ $details['lote']}}.</p>
    @if( $details['estado'] === '0' )
      <p>Tras revisar los detalles de esta adopción, hemos detectado que el comprobante de pago no es verídico, por lo tanto esta solicitud ha sido rechazada.</p>
      <p>Agradecemos que quieras apoyar esta fundación, cualquier consulta no dudes en contactarnos.</p>
    @else
      <p>Tras revisar los detalles de esta adopción, hemos confirmado los datos y aprobamos esta adopción. Hemos adjuntado un enlace a tu certificado, cualquier consulta no dudes en contactarnos.</p>
      <p>Gracias por ser parte de mi árbol para la vida.</p>
      <a href="{{ $details['certificado'] }}" download>Descargar certificado</a>
    @endif
    <br>
    <p>Saludos cordiales, FUDEBIOL</p>
</body>
</html>