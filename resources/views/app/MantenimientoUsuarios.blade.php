@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <input type="checkbox" id="check" checked="checked">
          <div id="agregarUsuario">
            <label id="btn_sidebar" for="check">
              <img src="img/flecha.png">
            </label>
             <label id="adduser" for="check">
               <i class="fas fa-user-plus" id=""></i>
            </label>
            <label id="RegUsuarios">Registrar Usuario</label>
            <label class="texto" for="nombre">Nombre completo</label>
            <input type="text" name="nombre">
            <label class="texto" for="email">E-mail</label>
            <input type="text" name="email">
            <label class="texto" for="usuario">Usuario</label>
            <input type="text" name="usuario">
            <label class="texto" for="contraseña">Contraseña</label>
            <input type="text" name="contraseña">
            <label class="texto" for="rol">Rol</label>
            <select name="rol">
                <option value="SW">Sitio Web</option>
                <option value="GA">Mi árbol para la vida</option>
            </select><br>
            <button class="btn_guardar">Agregar</button>


          </div>
          <div id="tabla">
        <table id="tablaUsuarios" >
              <caption>Administradores Fudebiol Digital</caption>
              <tbody>
                <tr>
                  <td style="background-color: transparent;"></td>
                  <th>Nombre</th>
                  <th>E-mail</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                </tr>
                <tr>
                  <th>1</th>
                  <td>Diego Tames Vargas</td>
                  <td>thamesdiego@gmail.com</td>
                  <td>Tames</td>
              
                  <td>Sitio web</td>
                </tr>
                <tr>
                  <th>2</th>
                 <td>Lizeth Monge Padilla</td>
                 <td>lizmonge15@gmail.com</td>
                 <td>Liz MP</td>
              
                 <td>Mi árbol para la vida</td>
                </tr>
                 <tr>
                  <th>3</th>
                 <td>Stefanny Barrantes Vargas</td>
                 <td>barrantesdenia@gmail.com</td>
                 <td>Tefa</td>
              
                 <td>Sitio web</td>
                </tr>
              </tbody>
            </table>
            <div id="botonesEdicion">
                <button class="btn_guardar"> Guardar</button>
                <button class="btn_eliminar"> Eliminar</button>
                <button class="btn_editar"> Editar</button>
            </div>
          </div>
        </div>
    </div>
@endsection
