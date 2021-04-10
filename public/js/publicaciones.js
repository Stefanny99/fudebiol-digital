var show = false;

function vistaPrevia(){
    let today = new Date();
    let titulo= document.getElementById("titulo-publicacion");
    let descripcion= document.getElementById("descripcion-publicacion");
    let tituloPublicacion= document.getElementById("publicacion-titulo");
    tituloPublicacion.innerHTML=titulo.value;
    let descripcionPublicacion= document.getElementById("publicacion-descripcion");
    descripcionPublicacion.innerHTML=descripcion.value;
    let contentFotos= document.getElementById("vista-previa-fotos").getElementsByTagName("img"); 
    let publicacionGaleria= document.getElementById("publicacion-imagenes-1"); 
    let fecha_publicacion= document.getElementById("publicacion-fecha");
    fecha_publicacion.innerHTML= today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    publicacionGaleria.innerHTML = "";

    //let ImagenesLista = Array.prototype.slice.call(contentFotos);
    for(let i = 0; i < contentFotos.length; i++){
        let inner= document.createElement("div");
        inner.classList.add("inner");
        inner.classList.add("size2");
        let foto= document.createElement("img");
        foto.classList.add("img-responsive");
        foto.classList.add("size");
        foto.src=contentFotos[i].src;
        inner.append(foto);
        publicacionGaleria.appendChild(inner);
    }
}

function removePhoto( id ){
    let contenedorPadre = document.getElementById( "fp-imagen-" + id );
    let contenedor = document.getElementById( "vista-previa-fotos" );
    let temp = contenedorPadre.hasAttribute( "data-temp" ) ? "temporales-" : "";
    let img = document.createElement( "input" );
    img.type = "hidden";
    img.name = "fp-imagenes-" + temp + "eliminadas[" + id + "]";
    img.value = contenedorPadre.getAttribute( "data-formato" );
    document.getElementById( "imagenes-eliminadas" ).append( img );
    contenedor.removeChild( contenedorPadre );
}

function updateImageChooser( imageChooser ){
    if ( imageChooser.files.length > 0 && FileReader ){
		let panel_cargando = document.getElementById( "panel-cargando" );
        panel_cargando.style.display = "flex";
        let container = document.getElementById("vista-previa-fotos");
        let data = new FormData();
        [ ... imageChooser.files ].forEach( ( file, i ) => data.append( "imagenes[]", file ) );
        axios.post( routes.agregarImagenesTemporales, data, {
            "header": {
                "Content-Type": "multipart/form-data"
            }
        } ).then( response => {
            response.data.imagenes?.forEach( imagen => {
                let image = document.createElement( "div" );
                image.id = "fp-imagen-" + imagen.FI_ID;
                image.className = "delete-photo";
                image.setAttribute( "data-temp", "temp" );
                image.setAttribute( "data-id", imagen.FI_ID );
                image.setAttribute( "data-formato", imagen.FI_FORMATO );
                let photo = document.createElement( "img" );
                photo.src = routes.fudebiol_imagenes + "/" + imagen.FI_ID + "." + imagen.FI_FORMATO;
                photo.className = "image-preview";
                let deletePhoto = document.createElement( "i" );
                deletePhoto.className = "fas fa-times";
                deletePhoto.onclick = () => removePhoto( imagen.FI_ID );
                let temp = document.createElement( "input" );
                temp.name = "fp-imagenes-temporales[]";
                temp.type = "hidden"
                temp.value = imagen.FI_ID;
                image.append( deletePhoto, photo, temp );
                container.appendChild( image );
            } );
            response.data.errores?.forEach( error => alertify.notify( error, "error" ) );
            panel_cargando.style.display = "none";
        } );
	}
}

function guardarPublicacion(){
    let imagenes = document.getElementById( "imagenes-publicacion" );
    imagenes.files = imagenesPublicaciones;
    console.log( imagenes.files );
}


function seeVoucher( imageChooser ){
  if ( imageChooser.files.length > 0 && FileReader ){
		let container = document.getElementById("pdf_img");
		[ ... imageChooser.files ].forEach( file => {
			let reader = new FileReader();
			reader.onload = () => {
			
        container.src= reader.result;
        
			};
			reader.readAsDataURL( file );
		} );
	}
}


function showPassword(eye){
  show=!show;
  var see= document.getElementById("clave");
  var eyes= document.getElementById("show");
  if(show==false){
    see.type="password";
    eyes.classList.add("fa-eye");
    eyes.classList.remove("fa-eye-slash");
  }else{
    see.type="text";
    eyes.classList.add("fa-eye-slash");
    eyes.classList.remove("fa-eye");
  }

}