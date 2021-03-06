@extends('layouts.app')

@section('content')
	
<div id="body_home">     
	<div id="contenido" class="gradiant_background2">
		<div class="report_container">
			<img  class="clip" src="{{asset('/img/clip.png')}}">
			<h1 style="text-align: center;"><b>Reporte de especie</b></h1>
			<h3 style="text-align: center;">{{ $arbol ? $arbol->FA_NOMBRES_COMUNES : $nombre->FA_NOMBRES_COMUNES }}</h3>
			<div class="row_container space-around">
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/especie1.png')}}">
					<h4><b>Total</b></h4>
					<label class="circle2 a total">{{ $arbol ? $arbol->TOTAL_ARBOLES : 0}}</label>
				</div>
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/especie2.png')}}">
					<h4><b>Adoptados</b></h4>
					<label class="circle2 a ocupados">{{ $arbol ? $arbol->TOTAL_ADOPTADOS : 0}}</label>
				</div>
				<div class="column_container"> 
				<img class="tree_pic_size"src="{{asset('/img/especie3.png')}}">
					<h4><b>Disponibles</b></h4>
					<label class="circle2 a libre">{{ $arbol ? $arbol->TOTAL_ARBOLES - $arbol->TOTAL_ADOPTADOS : 0 }}</label>
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
                    <a class="whatsapp contact" href="https://wa.me/+50689731001">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">8973-1001</div>
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