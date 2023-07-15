<div class="section-body" id="film">
    <div class="title" style="background:#312b2b4f;margin-top:20px;margin-bottom:25px"><h2>Anime</h2></div>

    <div class="section-body-card">

        @foreach ($anime as $item)
        <a href="/play/{{$item->id}}" class="gap-8">
            <div class="w-card">
                <div class="section-body-content">
                    <img src="/storage/{{$item->minuature_path}}" alt="{{$item->titre}}">
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

    <div class="pagination">{{ $anime->links('livewire.paginate') }}</div>
</div>
