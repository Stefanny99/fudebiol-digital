@extends('layouts.app')

@section('content')
    <script>
        var buscar_padrino = "{{ route( 'buscarPadrino' ) }}";
        var actualizar_token = "{{ route( 'actualizarToken', $arbol->token_id ) }}";
        var ver_arboles = "{{ route( 'arboles' ) }}";
        window.addEventListener( "load", () => {
            window.setInterval( actualizarToken, 3 * 60 * 1000 ); // El token se actualiza cada 3 minutos
        } );
    </script>
    <div id="body_home">     
        <div id="contenido">
            <div id="fondoAdoptarArboles" >
                <div class="titulo tituloAA">
                <img id="logovs" src="img/padrino.png" >
                <label>Proceso de adopción</label>
                <label id="subText">¡Gracias por dar tu granito de arena!</label>
                </div>
            </div>
            <form class="row_container" action="{{ route( 'finalizarAdopcion' ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="fao_id" type="hidden" value="{{ $arbol->token_id }}">
                <div class="escoger_lote">
                    <img id="arbolInfo" src="{{ $arbol->FA_IMAGEN_FORMATO ? asset( 'storage/img/fudebiol_arboles/' . $arbol->FA_ID . '.' . $arbol->FA_IMAGEN_FORMATO ) : asset( 'img/sinfoto.jpg' ) }}" style="object-fit: cover;">
                    <div id="datosArbol">
                        <input name="fal_id" type="hidden" value="{{ $arbol->FAL_ID }}">
                        <h4 class='center-text'><b>Datos del árbol elegido</b></h4>
                        <div class="texto"><b>Lote: </b>{{ $arbol->FL_NOMBRE }}</div>
                        <div class="texto"><b>Nombre: </b>{{ $arbol->FA_NOMBRE_CIENTIFICO }}</div>
                        <div class="texto"><b>Coordenada N: </b>{{ $arbol->FAL_COORDENADA_N }}&deg;</div>
                        <div class="texto"><b>Coordenada W: </b>{{ $arbol->FAL_COORDENADA_W }}&deg;</div>
                        <div class="texto"><b>Fila: </b>{{ $arbol->FAL_FILA }}</div>
                        <div class="texto"><b>Columna: </b>{{ $arbol->FAL_COLUMNA }}</div>
                    </div>
                </div>

            
                <div id="datosPadrino">
                    <div class="vd_bordes b1"></div>
                    <div id="padrino_info">
                        <h4 class='center-text'><b>Tus datos</b></h4>
                        <label class="texto"><b>Ingresa tu cédula de identidad:</b></label>
                        <input id="fp_cedula" type="text">
                        <button type="button" class="btn_verificar" onclick="verificarCedula();">Verificar cédula</button>
                        <div class="verificar_datos">
                            <input id="fp_id" name="fp_id" type="hidden" value="">
                            <label><i class="fas fa-user"></i> <span id="fp_nombre_completo"></span></label>
                            <label><i class="fas fa-envelope"></i> <span id="fp_correo"></span></label>
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
                                <input required name="comprobante" type="file" id="comprobante_input" style="display:none;" onchange="seeVoucher(this)">
                                <button id="btn_enviar_comprobante" type="submit" class="input_comprobante enviar" disabled>Enviar</button>
                            </div>
                        </div>
                    </div>
                    <iframe  id="pdf_img" ></iframe>
                </div>
            </form>
        </div>
    </div>
@endsection
