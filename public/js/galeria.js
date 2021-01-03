function mostrarFoto(foto){
	remover();
	var contenido= document.getElementById("contenedor");
	var base= document.createElement("div");
	base.className='base';
	base.innerHTML= '<img onclick="remover();" src= '+ foto.src+'><br> He aqui una descripcion de la foto...</div>';
	contenido.append(base);

}

function remover(){
	var base= document.getElementById("contenedor");
	var cont= document.getElementsByClassName("base");
	base.removeChild(base.lastChild);

}