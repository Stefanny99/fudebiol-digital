@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo" >
         <div id="titulo">
          <img id="logo" src="img/arbolito.png">
            <label >MI ÁRBOL PARA LA VIDA</label>
          <a href="http://localhost:8000/arboles">Ver árboles</a>
        </div>
        </div>

        <div class="home">
          <label class="TextReg">Registro de lotes</label>
          <label  class="subText">La madre tierra nos premia con tantas maravillas ¡Vamos a echarle una mano!</label>
         <div id="caja"> 
          <form id="cajaArbol" class="hvr-float">
            <div id="treeheader">
              <div id="treeheadermascara">
               <label id="RegArbol">Registra un nuevo </label>
               <label>lote</label>
               </div>
             </div>
            <label class="texto" for="codigo">Código:</label>
            <input type="text" name="codigo">

            <label class="texto" for="tamaño">Tamaño:</label>
            <input type="text" name="tamaño">

            <label class="texto" for="filas">Cantidad de filas:</label>
            <input type="text" name="filas">

            <label class="texto" for="columnas">Cantidad de columnas:</label>
            <input type="text" name="columnas">

            <button class="btn_registrar">Registrar</button>

          </form>  
            <div id="tabla" class="hvr-forward">
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
                  <th>Filas</th>
                  <th>Columnas</th>
                  <th>Acción</th>
                </tr>
                
                <tr class="fila">
                  <td class="fila">LA</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                   </td>
                </tr>

                 <tr class="fila">
                  <td class="fila">LB</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                   </td>
                </tr>
                  <tr class="fila">
                  <td class="fila">LC</td>
                  <td class="fila">34456 m</td>
                  <td class="fila">56</td>
                  <td class="fila">100</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                   </td>
                </tr>
               
               
              </tbody>
            </table>
            <div id="botonesEdicionArboles">
                <button class="btn_arboles"> Guardar</button>
            </div>
          </div>
          </div>
        </div>
       
          
          
        </div>
        </div>
    </div>
@endsection
