@extends('dashbord')

@section('dashbord')

<div class="section-body" id="film">
    <div class="title" style="background:#312b2b4f;margin-top:20px;margin-bottom:25px"><h2>Resultat</h2></div>

    <div class="section-body-card">

        @foreach ($result as $item)
        <a href="/play/{{$item->id}}" class="gap-8">
            <div class="w-card">
                <div class="section-body-content">
                    <img src="/storage/{{$item->minuature_path}}" alt="{{$item->titre}}">
                </div>
                <div class="body-card-footer">
                    <p style="color:rgba(168, 180, 190, 0.637)">{{$item->titre}}</p><p style="color:rgba(168, 180, 190, 0.637)">HD</p>
                </div>
                <div class="body-card-footer">
                    <p style="text-transform: lowercase;color:rgba(168, 180, 190, 0.637)">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p><p style="text-transform: lowercase;color:rgba(168, 180, 190, 0.637)">120 min</p>
                </div>
            </div>
        </a>
        @endforeach

    </div>

    <div class="pagination">{{ $result->links('livewire.paginate') }}</div>
</div>
@endsection