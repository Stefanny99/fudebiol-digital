@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo">
           <div id="titulo">
            <img id="logo" src="img/arbolito.png" >
            <label>MI ÁRBOL PARA LA VIDA</label>
            <a href="{{ route( 'registrarPadrino' ) }}">Registrar padrino</a>
            <a href="{{ route( 'registrarLote' ) }}">Registrar lote</a>
          </div>
        </div>
        <div class="contenedor_textos container">
         
              <label class="TextReg ">Registro de especies de árboles</label>
          <label  id="subText">Para FUDEBIOL es vital conservar la vida silvestre, por eso nuestro propósito es devolver al mundo tanta vida como la que nos ha dado.</label>
          
             
          </div>
        <div class="home" >
         <div id="caja"> 
          <form id="cajaArbol" class="hvr-float">
           
            <div id="treeheader">
              <div id="treeheadermascara"  class="container-fluid">
               <label id="RegArbol">Registra una nueva </label>
               <label>especie de árbol</label>
               </div>
             </div>
           
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

            <button class="btn_registrar btn">Registrar</button>

          </form>  
            <div id="tabla" class="hvr-forward container-fluid">
              <div id="buscador">
                <input type="text" name="buscar" placeholder="Buscar una especie">
                <button class="btn_buscar"><i class="fas fa-search"></i></button>
              </div>
              <table id="tablaArboles">
              <tbody>
                <tr id="tablehead" >
                  <th>Nombre científico</th>
                  <th>Jiffys</th>
                  <th>Bolsas</th>
                  <th>Elevación mínima</th>
                  <th>Elevación máxima </th>
                  <th>Acción</th>
                </tr>
                

                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    
                   </td>
                </tr>

                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
                  <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                    
                   </td>
                </tr>
                <tr class="fila">
                  <td class="fila">Arbolinus verdus de naranjis</td>
                  <td class="fila">34</td>
                  <td class="fila">56</td>
                  <td class="fila">1000</td>
                  <td class="fila">2000</td>
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
