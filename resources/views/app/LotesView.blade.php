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
            <label id="RegArbol">Registro de lotes</label>
            <label class="texto" for="nombreCientifico">Código:</label>
            <input type="text" name="nombreCientifico">

            <label class="texto" for="jiffys">Tamaño:</label>
            <input type="text" name="jiffys">

            <label class="texto" for="bolsas">Cantidad de filas:</label>
            <input type="text" name="bolsas">

            <label class="texto" for="elevacion_maxima">Cantidad de columnas:</label>
            <input type="text" name="elevacion_maxima">

            <button class="btn_registrar">Registrar</button>

          </form>  
            <div id="tabla">
              <div id="buscador">
                <input type="text" name="buscar" placeholder="Buscar un lote">
                <button class="btn_buscar"><i class="fas fa-search"></i></button>
              </div>
              <table id="tablaArboles" >
              <caption>Especies de árboles</caption>
              <tbody>
                <tr>
                  <th>Código</th>
                  <th>Tamaño</th>
                  <th>Cantidad de filas</th>
                  <th>Cantidad de columnas</th>
                </tr>
                
                <tr class="fila">
                  <td class="fila">LA</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
                </tr>

                 <tr class="fila">
                  <td class="fila">LB</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
                </tr>
                  <tr class="fila">
                  <td class="fila">LC</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
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