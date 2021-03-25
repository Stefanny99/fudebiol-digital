@extends('layouts.app')

@section('content')
    <div id="body_home">     
      <div id="contenido">
         <div id="fondoAdoptarArboles" >
            <div class="titulo tituloAA">
              <img id="logovs" src="img/padrino.png" >
              <label>Proceso de adopción</label>
              <label  id="subText">¡Gracias por dar tu granito de arena!</label>
            </div>
        </div>
        <div class="row_container">
          <div class="escoger_lote">
            <img id="arbolInfo" src="https://image.freepik.com/foto-gratis/tiro-vertical-arbol-alto-centro-campo-verde-bosque-fondo_181624-4585.jpg">
            <div id="datosArbol">
              <h4 class='center-text'><b>Datos del árbol elegido</b></h4>
              <label class="texto"><b>Nombre:</b> Pino</label>
              <label class="texto" for="tamaño"><b>Coordenada N:</b> 195°</label>
              <label class="texto" for="filas"><b>Coordenada W:</b> 65°</label>
              <label class="texto" for="columnas"><b>Fila:</b> 29</label>
              <label class="texto" for="columnas"><b>Columna:</b> 4</label>
            </div>
          </div>

         
            <div id="datosPadrino">
              <div class="vd_bordes b1"></div>
              <div id="padrino_info">
                <h4 class='center-text'><b>Tus datos</b></h4>
                <label class="texto"><b>Ingresa tu cédula de identidad:</b></label>
                <input type="text">
                <button  class="btn_verificar">Verificar cédula</button>
                <div class="verificar_datos">
                  <label><i class="fas fa-user"></i> Lizeth Monge Padilla</label>
                  <label><i class="fas fa-envelope"></i> lizmonge15@gmail.com</label>
                </div>
              </div>
              <div class="vd_bordes b2"></div>
            </div>
         

          <div class="escoger_lote column">
            <div id="datosComprobante">
              <div id="c_datos">
                <h5><b>Subir comprobante de transferencia por $50</b></h5>
                <div>
                  <label class="input_comprobante" for="comprobante_input"> Subir archivo</label>
                  <input type="file" id="comprobante_input" style="display:none;" onchange="seeVoucher(this)">
                  <a class="input_comprobante enviar" href="{{route('comprobante')}}">Enviar</a>
                </div>
              </div>
            </div>
            <iframe  id="pdf_img" ></iframe>
          </div>
        </div>
      </div>
    </div>
@endsection
