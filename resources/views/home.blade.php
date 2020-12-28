@extends('layouts.app')

@section('content')
    <div id="body_home">     
        <div id="contenido">
            <br> <br> <br>
             hola, la verdad aqui ni sé que va,  luego lo hablamos! 
             <br> <br> <br> <br> <br> <br> <br>
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
                <div class="right">
                    <form class="message-form" action="" method="post">
                        <div class="title">Dejar un mensaje</div>
                        <textarea class="body" name="message" placeholder="Mensaje" required></textarea>
                        <div class="email field">
                            <label for="message-email">Correo:</label>
                            <input id="message-email" class="email" name="email" type="email" placeholder="Correo electrónico">
                        </div>
                        <div class="Teléfono field">
                            <label for="message-phone">Teléfono:</label>
                            <input id="message-phone" class="phone" name="phone" type="text" placeholder="Número de teléfono">
                        </div>
                        <input id="message-remember" class="remember" name="remember" type="checkbox">
                        <label for="message-remember" class="remember-label">Recordar</label>
                        <input class="submit" type="submit" value="Envíar">
                    </form>
                    <div class="authors"><div class="author">Lizeth Monge, Diego Tames, Stefanny Barrantes</div> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
