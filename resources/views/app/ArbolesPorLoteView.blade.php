@extends('layouts.app')

@section('content')
    <script>
        var lotes = <?php echo json_encode( $lotes ); ?>;
        @foreach ( $lotes as $lote )
        window.addEventListener( "load", () => adopciones_cargarLote( {{ $lote->FL_ID }} ) );
        @break
        @endforeach
    </script>
    <div id="body_home">     
      <div id="contenido">
        <div id="fondoVisualizadorArboles" >
            <div class="titulo tituloVS">
              <img id="logovs" src="{{ asset( 'img/vsa.png' ) }}" >
              <label>Visualizador de árboles</label>
              <label  id="subText">¡Adopta un árbol y sé parte de esta gran familia!</label>
            </div>
        </div>
        <div id="cajavs">
          <div id="plano">
            <div class="tab_container">
            <h4><b>Selecciona un lote</b></h4>
              <div class="tab_buttons">
                @foreach ( $lotes as $lote )
                    <button type="button" onclick="adopciones_cargarLote( {{ $lote->FL_ID }} );">{{ $lote->FL_NOMBRE }}</button>
                @endforeach
              </div>
              <h6>(Desliza hacia la derecha)</h6>
              <div id="VisualizacionArboles">
                  <!--<div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                  <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                  </div>
                  <div>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree adoptado"></i>
                    <i class="fas fa-tree disponible"></i>
                    <i class="fas fa-tree disponible"></i>
                  </div>-->
              </div>
            </div>
            <div class="escoger_lote">
              <img id="arbolInfo" src="https://image.freepik.com/foto-gratis/tiro-vertical-arbol-alto-centro-campo-verde-bosque-fondo_181624-4585.jpg">
              <div id="datosArbol">
                <h4 class='center-text'><b>Datos del árbol</b></h4>
                <label class="texto"><b>Nombre:</b> Pino</label>
                <label class="texto" for="tamaño"><b>Coordenada N:</b> 195°</label>
                <label class="texto" for="filas"><b>Coordenada W:</b> 65°</label>
                <label class="texto" for="columnas"><b>Fila:</b> 29</label>
                <label class="texto" for="columnas"><b>Columna:</b> 4</label>
                <a href="{{route('adoptarArbol')}}"class="btn_adoptar">Adoptar</a>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection
