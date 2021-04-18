@extends('layouts.app')

@section('content')
    <script>
        var sinfoto = "{{ asset( 'img/sinfoto.jpg' ) }}";
        var imagenes_arboles = "{{ asset( 'storage/img/fudebiol_arboles' ) }}";
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
              <div id="VisualizacionArboles"></div>
            </div>
            <div class="escoger_lote" id="visualizador_arbol">
              <img id="arbolInfo" src="{{ asset( 'img/sinfoto.jpg' ) }}" style="object-fit: cover;"><!--https://image.freepik.com/foto-gratis/tiro-vertical-arbol-alto-centro-campo-verde-bosque-fondo_181624-4585.jpg-->
              <form id="datosArbol" action="{{ route( 'adoptarArbol' ) }}" method="get">
                <input id="fal_id" name="fal_id" type="hidden" value="">
                <h4 class='center-text'><b>Datos del árbol</b></h4>
                <div class="texto"><b>Lote: </b><span id="lote_arbol"></span></div>
                <div class="texto"><b>Nombre: </b><span id="nombre_arbol"></span></div>
                <div class="texto"><b>Coordenada N: </b><span id="coordenada_N_arbol"></span></div>
                <div class="texto"><b>Coordenada W: </b><span id="coordenada_W_arbol"></span></div>
                <div class="texto"><b>Fila: </b><span id="fila_arbol"></span></div>
                <div class="texto"><b>Columna: </b><span id="columna_arbol"></span></div>
                <div class="texto" id="padrino" style="display: none;"><b>Padrino: </b><span id="padrino_arbol"></span></div>
                <a class="texto"><b>Ver en Google Maps: </b></a>
                <button type="submit" id="btn_adoptar_arbol" class="btn_adoptar" style="display: none;">Adoptar</button>
              </form>
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
                        <div class="label">7265-9372</div>
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
@endsection
