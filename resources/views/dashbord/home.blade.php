@extends('dashbord')

@section('dashbord')
<div class="section-homePage">
    <div class="section-film"><a href="#film">Film</a></div>

    <div class="section-serie"><a href="#serie">Série</a></div>

    <div class="section-tele-realite"><a href="#tele-realite">Télé-réalité</a></div>

    <div class="section-anim"><a href="#anim">Anime</a></div>

    @if (Auth::user()->isAdmin == 1)
        <div class="section-admin" id="admin"><a href="{{route('admin.home')}}">Admin</a></div>
    @endif

    <div class="section-logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="logout" type="submit">Déconnection</button>
        </form>
    </div>
</div>


<livewire:story />

<livewire:film />

<livewire:series />
<livewire:tele-realite />
<livewire:anime />







@endsection