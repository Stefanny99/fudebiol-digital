var page = 1;

function loadGalleryPage(){
	var load_icon = document.getElementById( "load_icon" );
	load_icon.style.display = "block";
	axios.post( "<?php echo site_url( 'gallery/page/' ); ?>" + page ).then( result => {
		if ( result.data.success ){
			++page;
			document.getElementById( "gallery" ).append( ... result.data.data.map( image => {
				var element = document.createElement( "div" );
				element.className = "image";
				element.onclick = evt => { displayImage( element ) };
				element.style.backgroundImage = "url( '<?php echo resource_url( 'gallery/' ); ?>" + image.fi_id + "." + image.fi_formato + "' )";
				element.innerHTML = '<pre class="description">' + image.fi_descripcion + '</pre>';
				return element;
			} ) );
		}
		load_icon.style.display = "none";
	} ).catch( error => {
		load_icon.style.display = "none";
	} );
}