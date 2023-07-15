@extends('auth')

@section('auth')
<div class="main">
   
    @if ($message != null)
    <div class="message">
        <p class="error">{{$message}}</p> <button wire:click="close" title="Fermer">X</button>
    </div>
    @endif

<form action="{{route('auth.postlogin')}}" method="post">
    @csrf
    <div class="title">Z <span>R</span> T</div>

    <div class="link">
        <a href="/">Se connecter</a> <a href="/register">S'inscrire</a>
    </div>

    <div class="form-control">
        <input type="email" name="email" placeholder="Adresse email">
    </div>
    @error('email') <span class="error">{{ $message }}</span> @enderror 
 
    <div class="form-control">
        <input type="password" name="password" placeholder="Mot de passe">
    </div>
    
    @error('password') <span class="error">{{ $message }}</span> @enderror 
    <div class="check">
        <input type="checkbox" checked ><label>Souvenez-moi !</label>
    </div>
 
    <div class="btn"><button type="submit">Connexion</button></div>
    <div class="forget"><a href="/resset">Mot de passe oublié ?</a></div>
</form>
</div>
    
@endsection
