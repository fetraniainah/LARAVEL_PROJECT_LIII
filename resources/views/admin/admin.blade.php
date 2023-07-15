@extends('index')

@section('index')

<div class="video_main">
    <div class="video_container">
        <div class="video_form">
            <form action="{{route('postChaine')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form_button">
                    <h4>CREE UNE PLAYLIST</h4>
                </div>

                
                <div class="form_control file">
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" id="getfile">
                </div>

                <div class="shwo_video">
                    <img src="{{asset('image/avatar.png')}}" alt="avatar" id="postfile">
                </div>

                <div class="form_control">@error('image') <span class="error">{{ $message }}</span> @enderror </div>
                
                @error('name') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control">
                   
                    <input type="text" placeholder="Ajouter un nom de la chaine" name="name">
                </div>

                @error('type') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control">
                    <select id="select-type" name="type">
                        <option value="">Ajouter une catégorie de la chaine</option>
                        <option value="serie">Série</option>
                        <option value="film">Film</option>
                        <option value="tele-realite">Télé-réalité</option>
                        <option value="anime">Anime</option>
                      </select>
                </div>

                <div class="form_control">
                    <button class="submit" type="submit">AJOUTER</button>
                </div>
                </div>
            </form>
        </div>

    </div>

    <div class="list">
        @foreach ($chaine as $item)
           <a href="/add/{{$item->id}}">
            <div class="card-video">
                <h2 style="font-size:medium;color:whitesmoke; padding-bottom:10px">{{$item->name}}</h2>
                <img src="storage/{{$item->image}}" alt="image">
                <div class="flex">
                    <p class="medium">{{$item->type}}</p><p class="medium">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
                </div>
                
              </div>
            </a>
        @endforeach
    </div>


</div>





<script>

    let btn = document.querySelector('#postfile')
    let input = document.querySelector('#getfile')

    btn.addEventListener('click', ()=>{
        input.click()
        input.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
            btn.src = e.target.result;
        };
        reader.readAsDataURL(file);
        });

    })

</script>
    @endsection