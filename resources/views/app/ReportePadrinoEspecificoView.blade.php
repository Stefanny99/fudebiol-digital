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
            <h5><b>{{ $padrino->FP_NOMBRE_COMPLETO }}</b></h5>
            
          </div>
          <div class="column_container ml">
          <label>Adopciones</label>
            <h5><b>{{ $padrino->cantidad_adopciones }}</b></h5>
           
        </div>  
        <div class="column_container ml">
        <label>Especies</label>
            <h5><b>{{ count($adopciones) }}</b></h5>
           
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
	</div>
</div>


@endsection