@extends('layouts.app')

@section('content')

    <div id="body_home"> 
        <div id="contenido">
            <div id="fondoGaleria" >
                <div class="titulo tituloGaleria">
                    <img id="logoMAPLV" src="{{ asset('/img/logo.jpg')}}">
                    <label >GALERÍA</label>
                    <label  id="subText">¡Explora FUDEBIOL!</label>
                    </div>
                </div>
            </div>
            <div class="home">
                <div id="row">
                    @foreach ( $imagenes as $imagen )
                    <div class="inner" id="contenedor-imagen-{{ $imagen->FI_ID }}">
                        <img class="img-responsive" src="{{ asset( 'storage/img/fudebiol_imagenes/' . $imagen->FI_ID . '.' . $imagen->FI_FORMATO ) }}" alt="image" data-id="{{ $imagen->FI_ID }}" data-descripcion="{{ $imagen->FI_DESCRIPCION }}" onclick="mostrarFoto(this);" />
                    </div>
                    @endforeach
                </div>
            
            </div>
            <div id="pie">
            <div class="bottom">
                <div class="left">
                    <img class="icon img-responsive" src="{{ asset( 'img/vector.png' ) }}"></img>
                    <div class="sitename">&copy;FUDEBIOL</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon img-responsive" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="https://wa.me/+50672659372">
                        <img class="icon img-responsive" src="{{ asset( 'img/whatsapp.png' ) }}"></img>
                        <div class="label">7265-9372</div>
                    </a>
                    <a class="email contact" href="mailto:udebiol@gmail.com">
                        <img class="icon img-responsive" src="{{ asset( 'img/email.png' ) }}"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </a>
                </div>
               
            </div>
        </div>
    </div>
        </div>
    </div>
      
        
@endsection
