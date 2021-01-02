function displayImage( img ){
	var image = document.createElement( "div" );
	image.className = "image";
	image.style.backgroundImage = "url( '" + img.style.backgroundImage.slice( 4, -1 ).replace( /['"]/g, "" ) + "' )";
	var description = document.createElement( "pre" );
	description.className = "text";
	description.innerHTML = img.firstElementChild.innerHTML;
	var closeButton = document.createElement( "input" );
	closeButton.className = "close-button";
	closeButton.type = "button";
	closeButton.value = "Cerrar";
	var panel = openPanel( [ image, description ], [ closeButton ] );
	closeButton.onclick = evt => {
		closePanel( panel );
	};
}