@extends('layouts.app')

@section('content')
    <div id="body_home">     
      <div id="contenido">
        <div class="cc_background"> 
          <div class="cc_mascara">
            <div class="comprobant_container">
              <img class="end_process_img" src="/img/arb1.png">
              <h4><b>Etapa final de adopción</b></h4>
              Hola, {{ $nombre }}, muchas gracias por adoptar uno de nuestros árboles.
              Pronto un usuario administrador verificará
              el comprobante de transacción para hacer la adopción efectiva, luego recibirá 
              su certificado en el correo previamente registrado.
            </div>
          </div>
            
         </div> 
      </div>
    </div>
@endsection