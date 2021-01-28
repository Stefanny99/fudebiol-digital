@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo1">
          <input type="checkbox" id="check" checked="checked">
          <form id="agregarUsuario" method="post" action="{{ route( 'editarUsuario' ) }}">
            @csrf
            <label id="btn_sidebar" for="check">
              <img src="img/flecha.png">
            </label>
             <label id="adduser" for="check">
               <i class="fas fa-user-plus" id=""></i>
            </label>
            <label id="RegUsuarios">Registrar Usuario</label>
            <label class="texto" for="name">Nombre completo:</label>
            <input type="text" name="name">
            <label class="texto" for="email">E-mail:</label>
            <input type="text" name="email">
            <label class="texto" for="username">Usuario:</label>
            <input type="text" name="username">
            <label class="texto" for="password">Contraseña:</label>
            <input type="password" name="password">
            <label class="texto" for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation">
            <label class="texto" for="role">Rol</label>
            <select name="role">
                <option value="S">Sitio Web</option>
                <option value="A">Mi árbol para la vida</option>
            </select>
            <button class="btn_guardar">Agregar</button>


          </form>
          <div id="tabla">
        <table id="tablaUsuarios" >
              <caption>Administradores Fudebiol Digital</caption>
              <tbody>
                <tr class="thead">
                  <th class="thead" >Nombre</th>
                  <th class="thead">E-mail</th>
                  <th class="thead">Usuario</th>
                  <th class="thead">Rol</th>
                </tr>
                @foreach ( $usuarios as $usuario )
                <tr class="fila">
                  <td >{{ $usuario->name }}</td>
                  <td >{{ $usuario->email }}</td>
                  <td >{{ $usuario->username }}</td>
                  <td >{{ $usuario->role }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div id="botonesEdicion">
                <button class="btn_guardar"> Guardar</button>
                <button class="btn_guardar"> Eliminar</button>
                <button class="btn_guardar"> Editar</button>
            </div>
          </div>
        </div>
        </div>
    </div>
@endsection
