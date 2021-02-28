function vistaPrevia(){
  var today = new Date();
  var titulo= document.getElementById("titulo-publicacion");
  var descripcion= document.getElementById("descripcion-publicacion");
  var tituloPublicacion= document.getElementById("publicacion-titulo");
  tituloPublicacion.innerHTML=titulo.value;
  var descripcionPublicacion= document.getElementById("publicacion-descripcion");
  descripcionPublicacion.innerHTML=descripcion.value;
  var contentFotos= document.getElementById("vista-previa-fotos").getElementsByTagName("img"); 
  var publicacionGaleria= document.getElementById("publicacion-imagenes-1"); 
  var fecha_publicacion= document.getElementById("publicacion-fecha");
  fecha_publicacion.innerHTML= today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();

  var ImagenesLista = Array.prototype.slice.call(contentFotos);
            	for(let i = 0; i < contentFotos.length; i++)
				{
          var inner= document.createElement("div");
          inner.classList.add("inner");
          inner.classList.add("size2");
          var foto= document.createElement("img");
          foto.classList.add("img-responsive");
          foto.classList.add("size");
          foto.src=contentFotos[i].src;
          inner.append(foto);
          publicacionGaleria.appendChild(inner);
	    
				}

  

}

function removePhoto(contenedorPadre){
  var contenedor= document.getElementById("vista-previa-fotos");
  contenedor.removeChild(contenedorPadre);
}



function updateImageChooser( imageChooser ){
	if ( imageChooser.files.length > 0 && FileReader ){
		var container = document.getElementById("vista-previa-fotos");
		container.innerHTML = "";
		[ ... imageChooser.files ].forEach( file => {
			var reader = new FileReader();
			reader.onload = () => {
				var image = document.createElement( "div" );
				image.className = "delete-photo";
        var photo= document.createElement( "img");
        photo.src= reader.result;
        photo.className= "image-preview";
        var deletePhoto= document.createElement("i");
        deletePhoto.className="fas fa-times";
        deletePhoto.onclick=()=>removePhoto(image);
        image.append(deletePhoto, photo);
				container.appendChild( image );
			};
			reader.readAsDataURL( file );
		} );
	}
}
