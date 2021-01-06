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
                  <td class="number">1</td>
                  <td class="fila">Diego Tames Vargas</td>
                  <td class="fila">thamesdiego@gmail.com</td>
                  <td class="fila">Tames</td>
                  <td class="fila">Sitio web</td>
                </tr>
                <tr>
                  <td  class="number">2</td>
                 <td class="fila">Lizeth Monge Padilla</td>
                 <td class="fila">lizmonge15@gmail.com</td>
                 <td class="fila">Liz MP</td>
                 <td class="fila">Mi árbol para la vida</td>
                </tr>
                 <tr>
                  <td class="number">3</td>
                 <td class="fila">Stefanny Barrantes Vargas</td>
                 <td class="fila">barrantesdenia@gmail.com</td>
                 <td class="fila">Tefa</td>
                 <td class="fila">Sitio web</td>
                </tr>
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
@endsection
