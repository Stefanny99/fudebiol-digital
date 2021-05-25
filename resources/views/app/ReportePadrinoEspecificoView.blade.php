@extends('layouts.app')

@section('content')
	
<div id="body_home">     
	<div id="contenido" class="gradiant_background2">
		<div class="report_container">
			<img  class="clip" src="{{asset('/img/clip.png')}}">
			<h1 style="text-align: center;"><b>Reporte de adopciones según padrino</b></h1>
			<div class="row_container space-around">
      <div class="row_container">
					<img class="user_pic_size"src="{{asset('/img/users.png')}}">
          <div class="column_container space-around">
          <div class="column_container ml">
          <img class="user_pic_size2"src="{{asset('/img/users.png')}}">
            <label>Nombre</label>
            <h5><b>{{ $padrino ? $padrino->FP_NOMBRE_COMPLETO : ""}}</b></h5>
            
          </div>
          <div class="column_container ml">
          <label>Adopciones</label>
            <h5><b>{{ $padrino ? $padrino->cantidad_adopciones : 0 }}</b></h5>
           
        </div>  
        <div class="column_container ml">
        <label>Especies</label>
            <h5><b>{{ $adopciones ? count($adopciones) : 0}}</b></h5>
           
        </div> 
      </div> 
			</div>
      <div class="row_container">
					<img class="user_pic_size"src="{{asset('/img/especie1.png')}}">
          <div class="column_container  space-around">
          <div class="column_container ml">
          <img class="user_pic_size2"src="{{asset('/img/especie1.png')}}">
          @foreach ( $adopciones as $adopcion)
            <div class="column_container m1">
              <h4><b>{{ $adopcion->cantidad_adopciones }}</b></h4>
              <label>{{ $adopcion->FA_NOMBRES_COMUNES }}</label>
            </div>
          @endforeach
      </div> 
				</div>
			</div>
      </div>
		</div>
    <div id="pie">
                <div class="bottom">
                    <div class="left">
                        &copy; 2021, Lizeth Monge Padilla, Diego Tames Vargas, Stefanny Barrantes Vargas
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
                    <a class="whatsapp contact">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">2771-4131</div>
                    </a>
                    <a class="email contact" href="mailto:fudebiol@gmail.com">
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