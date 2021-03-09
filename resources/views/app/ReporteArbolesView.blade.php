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
					<label class="circle total">456457</label>
				</div>
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/adoptado.png')}}">
					<h4><b>Adoptados</b></h4>
					<label class="circle ocupados">35</label>
				</div>
				<div class="column_container"> 
				<img class="tree_pic_size"src="{{asset('/img/disponible.png')}}">
					<h4><b>Disponibles</b></h4>
					<label class="circle libre">4567</label>
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
					var chart= new Chart( ctx, {
							type: 'bar',
							data: {
								labels: ['guayabo', 'pino', 'cipres', 'amarillón' ,'roble', 'cristobal',
								'guayabo', 'pino', 'cipres','cristobal'],
								datasets: [ {
									label: 'Especies',
									data: [25,24, 23,20,19,13,11,9,7,5,3,1,0] ,
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