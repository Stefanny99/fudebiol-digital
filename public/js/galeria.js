var contador=0;
function mostrarFoto(foto){
	remover();
	var contenido= document.getElementById("visualizador1");
	var contenido2= document.getElementById("visualizador");
	contenido.style.backgroundImage = "url("+foto.src+")";
	var base= document.createElement("div");
	base.className='base';
	base.innerHTML= '<img onclick="remover();" src= '+ foto.src+'><br> <div>He aqui una descripcion de la foto...</div>';
	if(contador==0){

		contenido2.append(base);
		contador+=1;
	}
	

}

function remover(){
	var base= document.getElementById("visualizador");
	var cont= document.getElementsByClassName("base");
	if(contador==1){
		base.removeChild(base.lastChild);
		contador=0;
	}
	

}