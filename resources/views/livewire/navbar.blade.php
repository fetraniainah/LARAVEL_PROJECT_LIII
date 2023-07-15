<nav>
    <div class="logo">
        <div class="icon"><a href="/dashbord">Z <span>R</span> T</a></div>
        <div class="form">
            <form action="{{route('searchs')}}" method="post">
                <div class="sear_bar">
                    @csrf
                    <input type="search" name="search" id="" placeholder="Rechercher ....." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="/dashbord"><i class="fa-solid fa-house"></i> <span>Acceuil</span></a></li>
            <li><a href="/favoris"><i class="fa-solid fa-heart"></i> <span>Favoris</span></a></li>
            <li><a href="/payment/mobile"> <i class="fa-solid fa-cart-shopping"></i> <span>Magasin {{$expired}}</span></a></li>
            <li><a href="/notification" wire:click="read"> <i class="fa-solid fa-bell"></i> <span>Notification {{$notification}}</span></a></li>
            <li><a href=""><i class="fa-solid fa-user"></i> <span>Profile</span></a></li>
        </ul>
    </div>
</nav>
