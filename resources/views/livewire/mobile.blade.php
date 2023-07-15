<div class="fee"><p style="padding-left: 0"><img src="{{asset('mobile.png')}}" alt="ZRT" width="80" height="25"></p><p>Montant : {{$fee}} Ar</p></div>
<form method="post" action="{{route('postFees')}}">
    @csrf
    <div class="choose">
        <select name="method" required >
            <option value="" style="color:rgb(140, 145, 150)">Choisir la méthode de paiement </option>
            <option value="telma" style="color:rgb(140, 145, 150)">Telma</option>
            <option value="orange"  style="color:rgb(140, 145, 150)">Orange</option>
            <option value="airtel"  style="color:rgb(140, 145, 150)">Airtel</option>
        </select>
    </div>

    <div class="error"> @error('count') <span style="padding: 0;margin:0;color:brown;padding-left:25px">Le champ téléphone est obligatoire</span> @enderror</div>

    <div class="form">
        <input type="text" name="count" placeholder=" Numero de téléphone">
        <input type="hidden" name="montant" value="{{$fee}}">
    </div>


    <div class="error"> @error('password') <span style="padding: 0;margin:0;color:brown;padding-left:25px">Le champ mot de passe est obligatoire</span> @enderror</div>

    <div class="form">
        <input type="password" name="password" placeholder=" Mot de passe">
    </div>
    

    <div class="btn" ><button type="submit" wire::click="mount"> Payer maintenant</button></div>

</form>