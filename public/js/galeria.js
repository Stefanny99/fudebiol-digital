
function mostrarFoto(foto){
	var base= document.body;
	var contenedor= document.createElement("div");
	contenedor.id="panel";
	var contenedor2= document.createElement("div");
	contenedor2.id="contenedor2";
	var imagen=document.createElement("img");
	imagen.className="foto";
	imagen.src=foto.src;
	var descripcion=document.createElement("div");
	descripcion.className="descripcion";
	descripcion.innerHTML="Luego, continúa la historia con un recuerdo de niñez del aviador: una imagen de un elefante dentro de una boa en la que las personas mayores sólo veían un sombrero en vez de lo que realmente era. Pero cuando el aviador sufre una avería en el desierto del Sáhara y se encuentra con un hombrecito –el pequeño príncipe-, éste acierta ver en el dibujo “la boa cerrada”. De esta forma la historia del aviador francés consigue plasmar la gran brecha que separa el mundo infantil y el mundo adulto, “el primero, regido por la fantasía, y el segundo, basado en la lógica”, tal como destaca la psicóloga y psicoterapeuta infanto-juvenil y familiar Amalia Gordóvil Merino. Según la psicoterapeuta, con este relato sencillo, profundo y conmovedor, el autor habla de “la necesidad de entrar en el mundo de los más pequeños escuchándolos y disfrutando con ellos'";
	var botones= document.createElement("div");
	botones.id="botones";
	var next=document.createElement("label");
	next.classList.add("next");
	next.classList.add("hvr-backward");
	next.innerHTML="<i class='fas fa-chevron-right'></i>";
	next.onclick=nextImage(foto);
	var prev=document.createElement("label");
	prev.classList.add("prev");
	prev.classList.add("hvr-forward");
	prev.innerHTML='<i class="fas fa-chevron-left"></i>';
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


function nextImage(foto){

var imagen=foto;
var siguiente=document.getElementById('cajafoto').getElementsByTagName('img')[0];
console.log(siguiente.src);

}