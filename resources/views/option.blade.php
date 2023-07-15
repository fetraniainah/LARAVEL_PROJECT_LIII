<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('option/style.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/app.css')}}">
        @livewireStyles

	<title>ZRT</title>
</head>
<body class="dark">


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/dashbord" class="brand">
			<i class='bx bxs-smiles'></i>
			<span class="text">ZRT</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="/dashbord">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Acceuil</span>
				</a>
			</li>
			<li>
				<a href="/dashbord">
					<i class='bx bxs-movie' ></i>
					<span class="text">Films</span>
				</a>
			</li>
			<li>
				<a href="/dashbord">
					<i class='bx bxs-movie' ></i>
					<span class="text">Séries</span>
				</a>
			</li>
			<li>
				<a href="/dashbord">
					<i class='bx bxs-movie' ></i>
					<span class="text">Télé réalité</span>
				</a>
			</li>
			<li>
				<a href="/dashbord">
					<i class='bx bxs-movie' ></i>
					<span class="text">Anime</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="/dashbord">
					<i class='bx bxs-movie' ></i>
					<span class="text">Playlists</span>
				</a>
			</li>
			<li>
				<a href="/dashbord">
					<i class='bx bxs-cog' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Déconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="/dashbord" class="nav-link">Tableau de bord</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">1</span>
			</a>
			<a href="#" class="profile">
				<img src="{{asset('option/img/people.png')}}">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Admin</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">{{Auth::user()->email}}</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">{{Auth::user()->name}}</a>
						</li>
					</ul>
				</div>
				<a href="/home" class="btn-download">
					<i class='bx bxs-user' ></i>
					<span class="text">Ajouter un vidéo</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$userCount}}</h3>
						<p>Utilisateur</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$videoCount}}</h3>
						<p>Vidéo</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>{{$budjet}} Ar</h3>
						<p>Budjet</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Vidéo récents</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Titre</th>
								<th>Date de publication</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($videos as $item)
							<tr>
								<td>
									<img src="/storage/{{$item->minuature_path}}">
									<p>{{$item->titre}}</p>
								</td>
								<td>{{$item->created_at}}</td>
								<td><span class="status completed">ok</span></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Utilisateurs</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						@foreach ($users as $user)
						<li class="completed">
							<p>{{$user->name}}</p>
							<i>@if ($user->isAdmin==1)
								Admin
								@else
								Utilisateur
							@endif</i>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="{{asset('option/script.js')}}"></script>
	<script src="{{asset('admin/js/main.js')}}"></script>
    @livewireScripts
</body>
</html>