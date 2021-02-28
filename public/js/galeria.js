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
	contenedor2.append(imagen);
	if(!foto.getAttribute("data-descripcion")===''){
		contenedor2.append(descripcion);
	}
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
							 if(!imagenes[i+1].getAttribute("data-descripcion")===''){
				    	 	contDesc.innerHTML=imagenes[i+1].getAttribute("data-descripcion");
							 }
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
	de.innerHTML="De:&nbsp";
	var correo= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	correo.innerHTML="lizmonge15@gmail.com";
	mesage_mail.append(de,correo);

	var phone_mail= document.createElement("div");
	phone_mail.className="phone_mail";
	var telefono= document.createElement("label");
	telefono.innerHTML="Telefono:&nbsp";
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

function addNotification(){
	var mensajeria= document.getElementById("contenedor_mensajesN");

	var mesage= document.createElement("div");
	mesage.className="mesageN";

	var unread= document.createElement("div");
	unread.id="unreadN";

	var mesage_content= document.createElement("div");
	mesage_content.className="mesage_contentN";
	mesage_content.innerHTML="<h2>¡Hay una nueva adopción!</h2>";
	// mesage_content.innerHTML=sms.innerHTML;

	var mesage_data= document.createElement("div");
	mesage_data.className="mesage_data";
	

	var a= document.createElement("label");
	a.innerHTML="<b>A nombre de:&nbsp</b>";
	var nombre= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	nombre.innerHTML="Stefanny Barrantes Vargas";

	var cedula= document.createElement("label");
	cedula.innerHTML="<b>&nbspCédula:&nbsp</b>";
	var numero= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	numero.innerHTML="117360616";

	var delArbol= document.createElement("label");
	delArbol.innerHTML="<b>&nbspDel árbol:&nbsp</b>";
	var arbol= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	arbol.innerHTML="L2B23";

	var espec= document.createElement("label");
	espec.innerHTML="<b>&nbspEspecie:&nbsp</b>";
	var especie= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	especie.innerHTML="Manzanillo";

	var coorW= document.createElement("label");
	coorW.innerHTML="<b>&nbspCoordenada W:&nbsp</b>";
	var w= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	w.innerHTML='34"45"89';

	var coorN= document.createElement("label");
	coorN.innerHTML="<b>&nbspCoordenada N:&nbsp</b>";
	var n= document.createElement("label");
	// correo.innerHTML=correoUsuario.innerHTML;
	n.innerHTML='27"49"72';

	var leido= document.createElement("label");
	leido.htmlFor="leidoN";
	leido.innerHTML="Leído";

	var leidock= document.createElement("input");
	leidock.id="leidoN";
	leidock.type="checkbox";

	var eliminar= document.createElement("label");
	eliminar.htmlFor="eliminarN";
	eliminar.innerHTML="Eliminar";

	var eliminarck= document.createElement("input");
	eliminarck.id="eliminarN";
	eliminarck.type="checkbox";
	mesage_data.append(a,nombre,cedula,numero,delArbol,arbol,espec, especie,coorW,w,coorN,n);
	mesage.append(unread,mesage_content,mesage_data,leido,leidock,eliminar, eliminarck);
	mensajeria.appendChild(mesage);

}
function mostrarFotoSinDescripcion(foto){
	var base= document.body;
	var contenedor= document.createElement("div");
	contenedor.id="panel";
	var contenedor2= document.createElement("div");
	contenedor2.id="contenedor2";
	var imagen=document.createElement("img");
	imagen.id="foto";
	imagen.setAttribute("data-id", getAttribute("data-id"));
	imagen.src=foto.src;
	var botones= document.createElement("div");
	botones.id="botones";
	var next=document.createElement("label");
	next.classList.add("next");
	next.classList.add("hvr-backward");
	next.innerHTML="<i class='fas fa-chevron-right'></i>";
	next.onclick=nextImage2;
	var prev=document.createElement("label");
	prev.classList.add("prev");
	prev.classList.add("hvr-forward");
	prev.innerHTML='<i class="fas fa-chevron-left"></i>';
	prev.onclick=prevImage2;
	var exit=document.createElement("label");
	exit.classList.add("exit");
	exit.onclick=remover;
	exit.innerHTML="<i class='fas fa-times'></i>";
	botones.append(next, prev, exit);
	contenedor2.append(imagen);
	contenedor.append(contenedor2, botones);
	base.appendChild(contenedor);
}
function nextImage2(){
	var contImg=document.getElementById("foto");
	var imagen=contImg.src;
	var imagenes=document.getElementById("publicacion-imagenes-"+contImg.getAttribute("data-id")).getElementsByTagName("img");
	var ImagenesLista = Array.prototype.slice.call(imagenes);
					for(let i = 0; i < imagenes.length; i++)
					{
						if(imagen == imagenes[i].src && i < imagenes.length-1 ){
							 contImg.src=imagenes[i+1].src;
							 break;
						}
	
					}	
	}
	
	function prevImage2(){
	var contImg=document.getElementById("foto");
	var imagen=contImg.src;
	var imagenes=document.getElementById("publicacion-imagenes-"+contImg.getAttribute("data-id")).getElementsByTagName("img");
	var ImagenesLista = Array.prototype.slice.call(imagenes);
					for(let i = 0; i < imagenes.length; i++)
					{
						if(imagen == imagenes[i].src && i >0){
							 contImg.src=imagenes[i-1].src;
							break;
	
						}
	
					}
	
	}
           
function enableInput(edit){
	var pencil=edit;
	var input=pencil.previousSibling.previousSibling;
	input.removeAttribute('disabled');
}

function chargePicture(foto){
	var contImg=document.getElementById("eg_foto_pw");
	var imagen=foto.src;
	contImg.src=imagen;
}



function updateImages( imageChooser ){
	if ( imageChooser.files.length > 0 && FileReader ){
		var container = document.getElementById("eg_fotos_nuevas");
		container.innerHTML = "";
		[ ... imageChooser.files ].forEach( file => {
			var reader = new FileReader();
			reader.onload = () => {
        var photo= document.createElement( "img");
        photo.src= reader.result;
				photo.onclick=()=>chargePicture(photo);
        photo.className= "eg_foto_galeria";
				container.appendChild( photo );
			};
			reader.readAsDataURL( file );
		} );
	}
}
