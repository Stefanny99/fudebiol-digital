@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
          <div id="fondo" >
          <div id="titulo">
            <img id="logo" src="img/arbolito.png">
            <label >MI ÁRBOL PARA LA VIDA</label>
          </div>
         </div>
          <div class="contenedor_textos container">
           <label class="TextReg">Registro de padrinos</label>
          <label  id="subText">Si eres de quienes ama darle al mundo un respiro, sé parte de nuestra familia y adopta un árbol.</label>
          </div>
       <div class="home">
        
         <div id="caja"> 

          <form id="cajaArbol" class="hvr-float">
            <div id="treeheader">
              <div id="treeheadermascara" class="container-fluid">
               <label id="RegArbol">Apadrina un árbol </label>
               <label>¡Regístrate!</label>
               </div>
             </div>


            <div id="contTipo">
              <div class="tipo1">
                 <label class="texto" for="persona">Persona</label>
              <input type="radio" name="persona">
              </div>
             
              <div class="tipo2">
                 <label class="texto" for="empresa">Empresa</label>
              <input type="radio" name="empresa">
              </div>
              
            </div>
          
            <label class="texto" for="nombreCompleto">Nombre Completo:</label>
            <input type="text" name="nombreCompleto">

            <label class="texto" for="cedula">Cédula de identidad:</label>
            <input type="text" name="cedula">

            <button class="btn_registrar">Registrar</button>

          </form>  
            <div id="tabla" class="hvr-forward container-fluid">
              <div id="buscador">
                <input type="text" name="buscar" placeholder="Buscar un padrino">
                <button class="btn_buscar"><i class="fas fa-search"></i></button>
              </div>
              <table id="tablaArboles" >
              <tbody>
                <tr id="tablehead">
                   <th>Tipo</th>
                  <th>Nombre Completo</th>
                  <th>Cédula</th>
                  <th>Acción</th>
                </tr>
                
                <tr class="fila">
                  <td class="fila">Persona</td>
                  <td class="fila">Lizeth Monge Padilla</td>
                  <td class="fila">117560371</td>
                   <td class="fila">
                    <div class="action">
                       <label class="edit"><i class="far fa-edit"></i></label>
                     <label class="delete"><i class="far fa-trash-alt"></i></label>
                    </div>
                   </td>
                </tr>

                  <tr class="fila">
                    <td class="fila">Empresa</td>
                  <td class="fila">Diego Tames Vargas</td>
                  <td class="fila">117090201</td>
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
@endsection
