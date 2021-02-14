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

function addMessage(){
	var mensajeria= document.getElementById("contenedor_mensajes");
	var correoUsuario= document.getElementById("user_correo");
	var telefonoUsuario= document.getElementById("user_telefono");
	var sms= document.getElementById("comentario");

	var mesage= document.createElement("div");
	mesage.className="mesage";

	var unread= document.createElement("div");
	unread.id="unread";

	var mesage_mail= document.createElement("div");
	mesage_mail.className="mesage_mail";
	var de= document.createElement("label");
	de.innerHTML="De:";
	var correo= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	correo.innerHTML="lizmonge15@gmail.com";
	mesage_mail.append(de,correo);

	var phone_mail= document.createElement("div");
	phone_mail.className="phone_mail";
	var telefono= document.createElement("label");
	telefono.innerHTML="Telefono:";
	var numero= document.createElement("label");
	// numero.innerHTML=telefonoUsuario.innerHTML;
	numero.innerHTML="85316649";
	phone_mail.append(telefono, numero)

	var mesage_content= document.createElement("div");
	mesage_content.className="mesage_content";
	mesage_content.innerHTML="Hola, yuju! Esto es desde JavaScript...probando 1,2,3.."
	// mesage_content.innerHTML=sms.innerHTML;

	
	var leido= document.createElement("label");
	leido.htmlFor="leido";
	leido.innerHTML="Leído";

	var leidock= document.createElement("input");
	leidock.id="leido";
	leidock.type="checkbox";

	var eliminar= document.createElement("label");
	eliminar.htmlFor="eliminar";
	eliminar.innerHTML="Eliminar";

	var eliminarck= document.createElement("input");
	eliminarck.id="eliminar";
	eliminarck.type="checkbox";

	mesage.append(unread,mesage_mail, phone_mail, mesage_content, leido, leidock, eliminar, eliminarck)
	mensajeria.appendChild(mesage);
}

           