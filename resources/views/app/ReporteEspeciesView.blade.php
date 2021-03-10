@extends('layouts.app')

@section('content')
	
<div id="body_home">     
	<div id="contenido" class="gradiant_background2">
		<div class="report_container">
			<img  class="clip" src="{{asset('/img/clip.png')}}">
			<h1 style="text-align: center;"><b>Reporte de especie</b></h1>
			<div class="row_container space-around">
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/especie1.png')}}">
					<h4><b>Total de Guayabos</b></h4>
					<label class="circle2 a total">456457</label>
				</div>
				<div class="column_container">
					<img class="tree_pic_size"src="{{asset('/img/especie2.png')}}">
					<h4><b>Adoptados</b></h4>
					<label class="circle2 a ocupados">35</label>
				</div>
				<div class="column_container"> 
				<img class="tree_pic_size"src="{{asset('/img/especie3.png')}}">
					<h4><b>Disponibles</b></h4>
					<label class="circle2 a libre">4567</label>
				</div>
				
			</div>
		</div>	
	</div>
</div>


@endsection