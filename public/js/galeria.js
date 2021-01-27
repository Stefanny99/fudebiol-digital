var f;
function mostrarFoto(foto){
	var base= document.body;
	var contenedor= document.createElement("div");
	contenedor.id="panel";
	var contenedor2= document.createElement("div");
	contenedor2.id="contenedor2";
	var imagen=document.createElement("img");
	imagen.id="foto";
	imagen.src=foto.src;
	var descripcion=document.createElement("div");
	descripcion.id="descripcion";
	descripcion.innerHTML=foto.getAttribute("data-descripcion");
	var botones= document.createElement("div");
	botones.id="botones";
	var next=document.createElement("label");
	next.classList.add("next");
	next.classList.add("hvr-backward");
	next.innerHTML="<i class='fas fa-chevron-right'></i>";
	next.onclick=nextImage;
	var prev=document.createElement("label");
	prev.classList.add("prev");
	prev.classList.add("hvr-forward");
	prev.innerHTML='<i class="fas fa-chevron-left"></i>';
	prev.onclick=prevImage;
	var exit=document.createElement("label");
	exit.classList.add("exit");
	exit.onclick=remover;
	exit.innerHTML="<i class='fas fa-times'></i>";
	botones.append(next, prev, exit);
	contenedor2.append(imagen,descripcion);
	contenedor.append(contenedor2, botones);
	base.appendChild(contenedor);
}

function remover(){
var panel=document.getElementById("panel");
panel.remove();
}


function nextImage(){
var contImg=document.getElementById("foto");
var contDesc=document.getElementById("descripcion");
var imagen=contImg.src;
var imagenes=document.getElementById("row").getElementsByTagName("img");
var ImagenesLista = Array.prototype.slice.call(imagenes);
            	for(let i = 0; i < imagenes.length; i++)
				{
				    if(imagen == imagenes[i].src && i < imagenes.length-1 ){
				    	 contImg.src=imagenes[i+1].src;
				    	 contDesc.innerHTML=imagenes[i+1].getAttribute("data-descripcion");
				    	 break;
				    }

				}


}

function prevImage(){
var contImg=document.getElementById("foto");
var contDesc=document.getElementById("descripcion");
var imagen=contImg.src;
var imagenes=document.getElementById("row").getElementsByTagName("img");
var ImagenesLista = Array.prototype.slice.call(imagenes);
            	for(let i = 0; i < imagenes.length; i++)
				{
				    if(imagen == imagenes[i].src && i >0){
				    	console.log(imagenes[i-1].src);
				    	 contImg.src=imagenes[i-1].src;
				    	 contDesc.innerHTML=imagenes[i-1].getAttribute("data-descripcion");
				    	 break;

				    }

				}

}