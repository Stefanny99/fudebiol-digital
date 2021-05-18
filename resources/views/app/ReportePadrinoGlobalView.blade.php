@extends('layouts.app')

@section('content')
	
<div id="body_home">     
	<div id="contenido" class="gradiant_background">
		<div class="report_container">
			<img  class="clip" src="{{asset('/img/clip.png')}}">
			<h2 style="text-align: center;"><b>Reporte de padrinos según cantidad de adopciones</b></h2>
			<canvas id="canvas"></canvas>
			<script type="text/javascript">
				window.addEventListener('load', grafico);
				function grafico(){
					var canv=document.getElementById('canvas');
					var ctx=canv.getContext('2d');
					var padrinos={!!json_encode($padrinos, JSON_HEX_TAG)!!}
					var cantidad_adopciones={!!json_encode($cantidad_adopciones, JSON_HEX_TAG)!!}
					var chart= new Chart( ctx, {
							type: 'bar',
							data: {
								labels: padrinos,
								datasets: [ {
									label: 'Adopciones',
									data: cantidad_adopciones ,
									backgroundColor: "rgba( 0, 120, 18, 1 )"
								} ]
							},
							options: {
								scales: {
									yAxes: [ {
										ticks: {
											stepSize: 1

										}
									} ],
									xAxes: [ {
										ticks: {
											fontSize: 10,
										}
									} ]
								}
							}
						} );
					}
					
			</script>
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