<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZRT</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
       .mouvement{
        width:100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
       }
       .loader{
        display: none;
       }
    </style>
    @livewireStyles
</head>
<body>
    <livewire:navbar /> 
    <section class="section-yield">
        @yield('dashbord')
    </section>
    
    <script>
        const load = document.querySelector('#loader');
        window.addEventListener('load',()=>{
            load.classList.remove('.loader')
            load.classList.add('.mouvement')
        })
    </script>
    @livewireScripts
</body>
</html>