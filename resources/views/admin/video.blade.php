@extends('index')

@section('index')


<div class="video_main">
    <div class="video_container">
        <div class="video_image">
            <p> AJOUTER UN VIDEO</p> 
        </div>
        <div class="title">
            <p> Titre : {{$chaine->name}} </p> <p> Catégorie : {{$chaine->type}}</p>
        </div>
        <div class="video_form">
            <form action="{{route('admin.postMovie')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form_button">
                    <a class="image" id="btn-video">VIDEO</a> <a class="image" id="btn-image">MINIATURE</a>
                </div>

                @error('chaine_id') <span class="error">{{ $message }}</span> @enderror 
                <div class="form_control file">
                    <input type="hidden" name="chaine_id" value="{{$chaine->id}}">
                </div>

                @error('video_path') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control file">
                    <input type="file" name="video_path" id="input-video" accept=".mp4,.avi" />
                </div>

                @error('minuature_path') <span class="error">{{ $message }}</span> @enderror 
                <div class="form_control file">
                    <input type="file" name="minuature_path" accept=".png, .jpg, .jpeg" id="input-image">
                </div>

                <div class="shwo_video">
                    <video id="ma-video" class="fit-content" controls poster="" controlsList="nodownload">
                        <source src="" type="video/mp4">
                        <source src="" type="video/webm">
                        Votre navigateur ne supporte pas la balise vidéo.
                      </video>
                </div>

                @error('type') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control file">
                    <input type="hidden" placeholder="Ajouter une catégoris" value="{{$chaine->type}}" name="type">
                </div>

                @error('titre') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control">
                    <input type="text" placeholder="Ajouter une titre de video" name="titre">
                </div>
                    
                @error('auteur') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control">
                    <input type="text" name="auteur" placeholder="Auteur">
                </div>

                @error('description') <span class="error">{{ $message }}</span> @enderror
                <div class="form_control">
                    <textarea class="description" name="description" placeholder="Ajouter une description de la video"></textarea>
                </div>

                <div class="form_control">
                    <button class="submit" type="submit">AJOUTER</button>
                </div>
                </div>
            </form>
        </div>

    </div>

    <div class="list">
        @foreach ($video as $videos)
            <a href="/play/{{$videos->id}}">
            <div class="card-video">
                <h2>{{$videos->titre}}</h2>
                <video id="ma-video" class="fit-content"  poster="/storage/{{$videos->minuature_path}}" controlsList="nodownload">
                    <source src="/storage/{{$videos->minuature_path}}" type="video/mp4">
                    <source src="/storage/{{$videos->video_path}}" type="video/webm">
                    Votre navigateur ne supporte pas la balise vidéo.
                  </video>
                <div class="flex">
                    <p class="medium">{{$videos->type}}</p><p class="medium">{{\Carbon\Carbon::parse($videos->created_at)->diffForHumans()}}</p>
                </div>
              </div>
            </a>
        @endforeach
    </div>

</div>





<script>

const btnVideo = document.getElementById('btn-video');
  const btnImage = document.getElementById('btn-image');
  const maVideo = document.getElementById('ma-video');
  const inputVideo = document.getElementById('input-video');
  const inputImage = document.getElementById('input-image');

  btnVideo.addEventListener('click', () => {
    inputVideo.click() 
  });

  inputVideo.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = (e) => {
    maVideo.src = e.target.result;
  };
  reader.readAsDataURL(file);
});


  btnImage.addEventListener('click', () => {
    inputImage.click()
  });

  inputImage.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = (e) => {
    maVideo.poster = e.target.result;
  };
  reader.readAsDataURL(file);
});

</script>
    
@endsection