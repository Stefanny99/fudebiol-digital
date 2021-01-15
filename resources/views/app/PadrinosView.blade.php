@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo" >
         <div id="titulo">Mi árbol para la vida
         </div>
         <div id="caja"> 
          <form id="cajaArbol">
            <img id="arbol" src="img/tree.png">
            <label id="RegArbol">Registro de padrinos</label>

            <div id="contTipo">

            <div class="tipo1">
            <label for="persona">Persona</label>
            <input type="checkbox" name="persona">
          </div>

          <div class="tipo2">
            <label for="empresa">Empresa</label>
            <input type="checkbox" name="empresa">
          </div>

          </div>
          
            <label class="texto" for="nombreCientifico">Primer nombre:</label>
            <input type="text" name="nombreCientifico">

            <label class="texto" for="jiffys">Segundo nombre:</label>
            <input type="text" name="jiffys">

            <label class="texto" for="bolsas">Primer apellido:</label>
            <input type="text" name="bolsas">

            <label class="texto" for="elevacion_maxima">Segundo apellido:</label>
            <input type="text" name="elevacion_maxima">

            <label class="texto" for="elevacion_minima">Cédula de identidad:</label>
            <input type="text" name="elevacion_minima">

            <button class="btn_registrar">Registrar</button>

          </form>  
            <div id="tabla">
              <div id="buscador">
                <input type="text" name="buscar" placeholder="Buscar un padrino">
                <button class="btn_buscar"><i class="fas fa-search"></i></button>
              </div>
              <table id="tablaArboles" >
              <caption>Padrinos de adopciones</caption>
              <tbody>
                <tr>
                   <th>Tipo</th>
                  <th>Primer nombre</th>
                  <th>Segundo nombre</th>
                  <th>Primer apellido</th>
                  <th>Segundo apellido</th>
                  <th>Cédula </th>
                </tr>
                
                <tr class="fila">
                  <td class="fila">Persona</td>
                  <td class="fila">Lizeth</td>
                  <td class="fila">María</td>
                  <td class="fila">Monge</td>
                  <td class="fila">Padilla</td>
                  <td class="fila">117560371</td>
                </tr>

                  <tr class="fila">
                    <td class="fila">Empresa</td>
                  <td class="fila">Diego</td>
                  <td class="fila">Eduardo</td>
                  <td class="fila">Tames</td>
                  <td class="fila">Vargas</td>
                  <td class="fila">117090201</td>
                </tr>

                 <tr class="fila">
                  <td class="fila">Persona</td>
                  <td class="fila">Lizeth</td>
                  <td class="fila">María</td>
                  <td class="fila">Monge</td>
                  <td class="fila">Padilla</td>
                  <td class="fila">117560371</td>
                </tr>

                  <tr class="fila">
                    <td class="fila">Empresa</td>
                  <td class="fila">Diego</td>
                  <td class="fila">Eduardo</td>
                  <td class="fila">Tames</td>
                  <td class="fila">Vargas</td>
                  <td class="fila">117090201</td>
                </tr>
               
              </tbody>
            </table>
            <div id="botonesEdicionArboles">
                <button class="btn_arboles"> Guardar</button>
                <button class="btn_arboles"> Eliminar</button>
                <button class="btn_arboles"> Editar</button>
            </div>
          </div>
          </div>

       
          </div>
          
        </div>
        </div>
    </div>
@endsection
