@extends('layouts.app')

@section('content')
	
<div id="body_home">     
	<div id="contenido" class="gradiant_background">
		<div class="report_container">
			<img  class="clip" src="{{asset('/img/clip.png')}}">
			<h1 style="text-align: center;"><b>Reporte de árboles</b></h1>
			<div class="row_container space-around">
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/bosque.png')}}">
					<h4><b>Total de árboles</b></h4>
					<label class="circle total">{{ $total_arboles }}</label>
				</div>
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/adoptado.png')}}">
					<h4><b>Adoptados</b></h4>
					<label class="circle ocupados">{{ $total_adoptados }}</label>
				</div>
				<div class="column_container"> 
				<img class="tree_pic_size"src="{{asset('/img/disponible.png')}}">
					<h4><b>Disponibles</b></h4>
					<label class="circle libre">{{ $total_arboles - $total_adoptados }}</label>
				</div>
				
			</div>
			<br>
			<h2><b>Adopciones de árboles según especie</b></h2>
			<canvas id="canvas" width="400" height="100"></canvas>
			<script type="text/javascript">
				window.addEventListener('load', grafico);
				function grafico(){
					var canv=document.getElementById('canvas');
					var ctx=canv.getContext('2d');
					var especies={!!json_encode($especies, JSON_HEX_TAG)!!}
					var cantidad={!!json_encode($cantidad, JSON_HEX_TAG)!!}
					var chart= new Chart( ctx, {
							type: 'bar',
							data: {
								labels: especies,
								datasets: [ {
									label: 'Especies',
									data: cantidad,
									backgroundColor: "rgba( 0, 136, 18, 1 )"
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
	</div>
</div>


@endsection