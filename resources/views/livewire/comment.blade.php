<div class="post-comment">
    <form  wire:submit.prevent="addComment">
      @csrf
      @error('content') <span style="padding: 0;margin:0;color:brown;padding-left:25px">Le champ commentaire est obligatoire</span> @enderror
      <textarea wire:model="content" placeholder="Ajouter un commantaire"></textarea>
      <button type="submit">Envoyer</button>
    </form>
  </div>

  <div class="comment">
    <h3 style="color:#fff;padding-left:25px">Commentaire</h3>
    @foreach ($comments as $comment)
      <p style="color:#fff;padding-left:25px;margin:4px"><b>{{$comment->username}}</b> <span style="color:#d4cccc;font-size:small"> <i> {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</i></span></p>
      <p style="color:#fff;padding-left:40px;margin:0">{{$comment->content}}</p>
    @endforeach
  </div>

  