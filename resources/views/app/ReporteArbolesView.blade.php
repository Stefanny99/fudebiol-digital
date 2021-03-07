@extends('layouts.app')

@section('content')
	
    <div class="contenedor_reporte"> 
    	<br><br>
    	<div id="report_container"> 
			<h2 style="text-align: center;">Reporte Vacantes</h2><br>
			<canvas id="canvas" width="400" height="200"></canvas>
			 
			
			<script type="text/javascript">
				window.addEventListener('load', grafico);
				function grafico(){
					var canv=document.getElementById('canvas');
					var ctx=canv.getContext('2d');
					var vacantes={!!json_encode($vacantes, JSON_HEX_TAG)!!}
					var empresas={!!json_encode($empresas, JSON_HEX_TAG)!!}
					var chart= new Chart( ctx, {
						type: 'bar',
						data: {
							labels: empresas,
							datasets: [ {
								label: 'Empresas',
								data: vacantes,
								backgroundColor: "rgba( 80, 50, 80, 1 )"
							} ]
						},
						options: {
							scales: {
								yAxes: [ {
									ticks: {
										stepSize: vacantes.reduce( ( suma, sig ) => { return suma + sig; } ) / vacantes.length

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
		</div><br>
    </div>


@endsection