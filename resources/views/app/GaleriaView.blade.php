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
      
        </div>
    </div>
      
        
@endsection
