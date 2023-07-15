<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/app.css')}}">
        @livewireStyles

        <title>Admin</title>
    </head>
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">
                <img src="{{asset('admin/img/perfil.jpg')}}" alt="" class="header__img">

                <a href="/" class="header__logo">Admin</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon' style="color: darkred;"></i>
                </div>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== CONTENTS ==========-->
        <main style="padding: 50px">
            <section>
                @yield('index')
            </section>
        </main>

        <!--========== MAIN JS ==========-->
        <script src="{{asset('admin/js/main.js')}}"></script>
        @livewireScripts
    </body>
</html>