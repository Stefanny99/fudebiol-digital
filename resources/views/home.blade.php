@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
        
        </div>  
        <div id="pie">
            <div class="top"> aqui va algo</div>
            <div class="bottom">
                <div class="left">
                    <img class="logo" src="img/vector.png"></img>
                    <div class="sitename">&copy;Fudebiol</div>
                </div>
                <div class="middle">
                    <a class="facebook contact" href="https://www.facebook.com/FUDEBIOL/">
                        <img class="icon" src="img/facebook.png"></img>
                        <div class="label">@FUDEBIOL</div>
                    </a>
                    <a class="whatsapp contact" href="">
                        <img class="icon" src="img/whatsapp.png"></img>
                        <div class="label">7265-9372</div>
                    </a>
                    <span class="email contact">
                        <img class="icon" src="img/email.png"></img>
                        <div class="label">fudebiol@gmail.com</div>
                    </span>
                </div>
               
            </div>
        </div>
    </div>
@endsection
