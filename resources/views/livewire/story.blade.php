
<div class="section-story">

    <div class="section-content">
        <div class="stories">
           @foreach ($film as $item)
           <div class="story">
               <a href="/play/{{$item->id}}">
                   <img src="/storage/{{$item->minuature_path}}" alt="{{$item->titre}}">
               </a>
            </div>
          @endforeach
        </div>
    </div>

</div>

@if(session('success'))
    <div class="width:100%;">
        <p style="color:greenyellow;font-size:medium;text-align:center">{{ session('success') }}</p>
    </div>
@endif

@if(session('fail'))
    <div class="width:100%;">
        <p style="color:greenyellow;font-size:medium;text-align:center">{{ session('fail') }}</p>
    </div>
@endif

