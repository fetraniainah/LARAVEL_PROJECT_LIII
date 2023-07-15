@extends('dashbord')

@section('dashbord')

<div class="section-body" id="film">
    <div class="title" style="background:#312b2b4f;margin-top:20px;margin-bottom:25px"><h2>Liste des favoris</h2></div>

    <div class="section-body-card">

        @foreach ($favoris as $item)
        <a href="/play/{{$item->id}}" class="gap-8">
            <div class="w-card">
                <div class="section-body-content">
                    <img src="{{asset('assets/images/bg.jpg')}}" alt="{{$item->titre}}">
                </div>
                <div class="body-card-footer">
                    <p>{{$item->titre}}</p><p>HD</p>
                </div>
                <div class="body-card-footer">
                    <p>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p><p>120 min</p>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection