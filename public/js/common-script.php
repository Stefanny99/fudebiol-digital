var panel_z = 2;

function openPanel( cont, btns = [] ){
	var panel = document.createElement( "div" );
	panel.className = "panel";
	panel.style.zIndex = ++panel_z;
	var content = document.createElement( "div" );
	content.className = "content";
	content.append( ... cont );
	var buttons = document.createElement( "div" );
	buttons.className = "buttons";
	buttons.append( ... btns );
	panel.append( content, buttons );
	document.body.appendChild( panel );
	return panel;
}

function closePanel( panel ){
	if ( panel ){
		--panel_z;
		panel.remove();
	}
}