@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo" >
         <div id="titulo">Mi árbol para la vida
          <a href="http://localhost:8000/registrarPadrino">Registrar padrino</a></div>
         <div id="caja"> 
          <form id="cajaArbol">
            <img id="arbol" src="img/tree.png">
            <label id="RegArbol">Registro de especies de árboles</label>
            <label class="texto" for="nombreCientifico">Nombre científico:</label>
            <input type="text" name="nombreCientifico">

            <label class="texto" for="jiffys">Jiffys:</label>
            <input type="text" name="jiffys">

            <label class="texto" for="bolsas">Bolsas:</label>
            <input type="text" name="bolsas">

            <label class="texto" for="elevacion_maxima">Elevación máxima:</label>
            <input type="text" name="elevacion_maxima">

            <label class="texto" for="elevacion_minima">Elevación mínima:</label>
            <input type="text" name="elevacion_minima">

            <button class="btn_registrar">Registrar</button>

          </form>  
            <div id="tabla">
              <div id="buscador">
                <input type="text" name="buscar" placeholder="Buscar un árbol">
                <button class="btn_buscar"><i class="fas fa-search"></i></button>
              </div>
              <table id="tablaArboles" >
              <caption>Especies de árboles</caption>
              <tbody>
                <tr>
                  <th>Nombre científico</th>
                  <th>Jiffys</th>
                  <th>Bolsas</th>
                  <th>Elevación mínima</th>
                  <th>Elevación máxima </th>
                </tr>
                
                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                </tr>

                 <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                </tr>

                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                </tr>

                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                </tr>
                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
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
