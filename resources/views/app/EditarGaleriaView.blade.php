@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div  id="eg_base_fondo"> 
            <div class="eg_fotos">
              <!-- marco de la foto -->
              @foreach ( $imagenes as $imagen )
              <form class="eg_base_foto" action="{{ route( 'editarFoto' ) }}" method="post"> 
                @csrf
                <img class="eg_foto_galeria"  src="{{asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO )}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input type="hidden" name="fi_id" value="{{ $imagen->FI_ID }}">
                    <input type="hidden" name="fi_formato" value="{{ $imagen->FI_FORMATO }}">
                    <input required id="eg_descripcion_img{{ $imagen->FI_ID }}" class="eg_input" name="fi_descripcion" type="text" disabled value="{{ $imagen->FI_DESCRIPCION }}">
                    <i class="editDes fas fa-pen" onclick="enableInput( '{{ $imagen->FI_ID }}' );"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button disabled id="eg_btn_guardar_img{{ $imagen->FI_ID }}" type="submit" name="guardar" class="btn_eg_save">Guardar</button>
                  <button type="submit" name="eliminar" class="btn_eg_delete">Eliminar</button>
                </div>
              </form>
              @endforeach
              <!--fin de marco de la foto -->

            </div>
            <form class="eg_nueva_foto" action="{{ route( 'guardarFotos' ) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="eg_img_preview">
                <script>
                  function eg_reiniciar_foto(){
                    document.getElementById("eg_foto_pw").src = "{{asset('/img/sinfoto.jpg')}}";
                    let descripcion_pw = document.getElementById( "eg_descripcion_pw" );
                    descripcion_pw.value = "";
                    descripcion_pw.setAttribute( "data-id", "" );
                  }
                </script>
               <img class="eg_foto_galeria_pw" id="eg_foto_pw" src="{{asset('/img/sinfoto.jpg')}}">
               <div class="eg_textos_pw" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input id="eg_descripcion_pw" class="eg_input outline_none"  placeholder="Escribe aquí"type="text" value="" data-id="" onchange="sincronizarDescripcion()" onkeyup="sincronizarDescripcion()">
                  </div>
                </div>
                <div class="eg_botones ">
                  <button type="submit" class="btn_eg_save">Guardar</button>
                </div>
              </div>
              <div class="eg_tools">
                <div>
                  <label  class="eg_label_file" for="eg_input_files">Agregar fotografías</label>
                  <input name="fotos[]" id="eg_input_files" onchange="updateImages(this)" multiple class="eg_input_file" type="file">
                </div>
                <div id="eg_fotos_nuevas"></div>
                <div id="eg_descripciones_nuevas"></div>
              </div>

            </form>
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
    </div>
@endsection
