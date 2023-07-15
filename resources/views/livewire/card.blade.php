<div class="fee"><p style="padding-left: 0"><img src="{{asset('visa.png')}}" alt="ZRT" width="80" height="25"></p> <p>Montant : {{$fee}} Ar</p></div>
<form method="post" action="{{route('postFees')}}">
    @csrf
    <div class="form">
        <input type="text" name="count" required placeholder=" 7865 8986 4535 0098" minlength="12" maxlength="12">
        <input type="hidden" name="montant" value="{{$fee}}">
        <input type="hidden" name="method" value="card credit">
    </div>

    <div class="verify-card">
        <div class="expired"><input type="text" placeholder="M" minlength="2" required maxlength="2" name="m"> <span>/</span> <input placeholder="Y" minlength="2" maxlength="2" type="text" name="y"></div>
        <div class="code-validate"><input minlength="4" maxlength="4" placeholder="CCV" required type="text" name="ccv"></div>
    </div>
    <div class="btn"><button type="submit"> Payer maintenant</button></div>
</form>