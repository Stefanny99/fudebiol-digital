@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div  id="eg_base_fondo"> 
            <div class="eg_fotos">
              <!-- marco de la foto -->
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/fude1.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/fude2.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/fude3.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/fude4.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/b1.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/b2.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <div class="eg_base_foto" > 
                <img class="eg_foto_galeria"  src="{{asset('/img/b3.jpg')}}">
                <div class="eg_textos" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input" type="text" disabled value="Esta es la descripcion de la foto">
                    <i class="editDes fas fa-pen" onclick="enableInput(this);"></i>
                  </div>
                </div>
                <div class="eg_botones">
                  <button class="btn_eg_save">Guardar</button>
                  <button class="btn_eg_delete">Eliminar</button>
                </div>
              </div>
              <!--fin de marco de la foto -->

            </div>
            <div class="eg_nueva_foto">
              <div class="eg_img_preview">
               <img class="eg_foto_galeria_pw" id="eg_foto_pw" src="{{asset('/img/sinfoto.jpg')}}">
               <div class="eg_textos_pw" >
                  <b>Descripción</b>
                  <div class="eg_editar_descripcion">
                    <input class="eg_input outline_none"  placeholder="Escribe aquí"type="text" value="">
                  </div>
                </div>
                <div class="eg_botones ">
                  <button class="btn_eg_save">Guardar</button>
                </div>
              </div>
              <div class="eg_tools">
                <div>
                  <label  class="eg_label_file" for="eg_input_files">Agregar fotografías</label>
                  <input id="eg_input_files" onchange="updateImages(this)" multiple class="eg_input_file" type="file">
                </div>
                <div id="eg_fotos_nuevas">
                </div> 
              </div>

            </div>
          </div>
        </div>
    </div>
@endsection
