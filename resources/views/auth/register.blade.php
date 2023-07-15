@extends('auth')

@section('auth')
<div class="main">
    <form action="{{route('postRegister')}}" method="post">
        <div class="title">Z <span>R</span> T</div>
            @csrf
        <div class="link">
            <a href="/">Se connecter</a> <a href="/register">S'inscrire</a>
        </div>


        <div class="form-control"><input type="text" name="name" placeholder="Nom d'utilisateur"></div>
        @error('name') <span class="error">{{ $message }}</span> @enderror
     
        <div class="form-control"><input type="text" name="email" placeholder="Adresse email"></div>
        @error('email') <span class="error">{{ $message }}</span> @enderror 

        <div class="form-control"><input type="password" name="password" placeholder="Mot de passe"></div>
        @error('password') <span class="error">{{ $message }}</span> @enderror
     
        <div class="btn"><button type="submit">INSCRIPTION</button></div>
    </form>
</div>

    
@endsection