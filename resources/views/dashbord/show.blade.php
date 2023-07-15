@extends('dashbord')

@section('dashbord')
<style>
  svg{
    width: 20px;
    fill: rgba(179, 179, 204, 0.959);
    padding-left: 5px;
    justify-content: center;
    align-items: center;
     
  }
  #comment{
    text-decoration: none;
    color: white;
    padding: 0 3px;
  }
</style>
<div class="show">


    <div class="play_body">
          <video id="ma-video" class="fit-content" controls  poster="{{asset('mn.png')}}" controlsList="nodownload">
              <source src="/storage/{{$video->video_path}}" type="video/mp4">
              <source src="/storage/{{$video->video_path}}" type="video/webm">
              Votre navigateur ne supporte pas la balise vidéo.
            </video>
    </div>
      <div class="info">

        <h2>Titre : {{$video->titre}}</h2>
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
          <livewire:like :videoId="$video->id" />
        
        

        <div class="about">
          <p>Déscription : {{$video->description}}</p>
          <p>Crée par : {{$video->auteur}}</p>
          <p class="medium">Publié {{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</p>
        </div>

        <livewire:comment :videoId="$video->id" />
    </div>

<div>



@endsection