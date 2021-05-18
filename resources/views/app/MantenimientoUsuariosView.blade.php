@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo1">
          <input type="checkbox" id="check" checked="checked">
          <form id="agregarUsuario" method="post" action="{{ route( 'editarUsuario' ) }}">
            @csrf
            <input id="id_usuario" name="id" type="hidden" value="0">
            <label id="btn_sidebar" for="check">
              <img src="img/flecha.png">
            </label>
             <div id="agregarUsuarioCont">
              <label id="RegUsuarios">Registrar Usuario</label>
              <label class="texto" for="nombre_usuario">Nombre completo:</label>
              <input id="nombre_usuario" type="text" name="name">
              <label class="texto" for="email_usuario">E-mail:</label>
              <input id="email_usuario" type="text" name="email">
              <label class="texto" for="nombreusuario_usuario">Usuario:</label>
              <input id="nombreusuario_usuario" type="text" name="username">
              <label class="texto" for="clave_usuario">Contraseña:</label>
              <input id="clave_usuario" type="password" name="password">
              <label class="texto" for="confirmacion_clave_usuario">Confirmar Contraseña:</label>
              <input id="confirmacion_clave_usuario" type="password" name="password_confirmation">
              <label class="texto" for="role">Rol</label>
           
                <select id="rol_usuario" name="role">
                    <option value="S">Sitio Web</option>
                    <option value="A">Mi árbol para la vida</option>
                </select>
              
             </div> 
             <div class="botones">
              <button type="submit" class="btn_guardar">Guardar</button>
              <button type="button" class="btn_limpiar" onclick="limpiarUsuario();">Limpiar</button>
            </div>

          </form>
          <div id="tabla">
        <form action="{{ route( 'eliminarUsuarios' ) }}" method="post">
          @csrf
          <table id="tablaUsuarios" >
                <caption>Administradores Fudebiol Digital</caption>
                  <thead>
                      <th class="thread"></th>
                      <th class="thead" >Nombre</th>
                      <th class="thead">E-mail</th>
                      <th class="thead">Usuario</th>
                      <th class="thead">Rol</th>
                      <th class="thead">Acción</th>
                  </thead>
                  <tbody>
                    @foreach ( $usuarios as $usuario )
                    <tr class="fila" id="usuario_{{ $usuario->id }}" data-id="{{ $usuario->id }}" data-name="{{ $usuario->name }}" data-email="{{ $usuario->email }}" data-username="{{ $usuario->username }}" data-role="{{ $usuario->role }}">
                      <td><input name="ids[]" type="checkbox" value="{{ $usuario->id }}"></td>
                      <td style="width:15vw;" >{{ $usuario->name }}</td>
                      <td class="campo_size_email" >{{ $usuario->email }}</td>
                      <td >{{ $usuario->username }}</td>
                      <td >{{ $usuario->role }}</td>
                      <td class="edit-size">
                          <label class="edit"  onclick="editarUsuario( 'usuario_{{ $usuario->id }}' )"><i class="far fa-edit"></i></label>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>  
              </table>
              <div id="botonesEdicion">
                <button type="delete" class="btn_eliminarUsuario crecer"><i class="far fa-trash-alt"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
