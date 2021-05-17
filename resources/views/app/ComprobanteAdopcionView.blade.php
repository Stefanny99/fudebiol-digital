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
         <div id="pie">
            <div class="bottom">
                <div class="left">
                    <img class="icon img-responsive" src="{{ asset( 'img/vector.png' ) }}"></img>
                    <div class="sitename">&copy;FUDEBIOL</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50672659372">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:udebiol@gmail.com">
                        <img class="icon img-responsive" src="{{ asset( 'img/email.png' ) }}"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </a>
                </div>
               
            </div>
        </div>
    </div>
      </div>
    </div>
@endsection