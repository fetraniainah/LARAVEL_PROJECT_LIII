<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="{{asset('assets/css/order.css')}}">
    @livewireStyles
</head>
<body>
    <div class="section-payment">
            <div class="header"> <h2>Z <span>R</span> T</h2></div>

            <div class="method"><a href="/payment/mobile">Mobile money</a> <a href="/payment/card">Carte crédit</a></div>
            <div class="form">
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
            </div>
            
            <div class="card-form">
                @yield('order')
            </div>
    </div>
    









    @livewireScripts
</body>
</html>